<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PayementResource\Pages;
use App\Models\payement;
use App\Models\produitmodel;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;

class PayementResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = payement::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationLabel = 'Paiements';
    protected static ?string $navigationGroup = 'Clients';

       public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
           
        ];
    }

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations Client')
                    ->description('Sélectionnez le client et le produit')
                    ->icon('heroicon-o-user')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('client_id')
                            ->label('Client')
                            ->relationship('client', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nom')
                                    ->required(),
                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required(),
                                Forms\Components\TextInput::make('phone')
                                    ->label('Téléphone')
                                    ->tel()
                                    ->required(),
                            ]),

                           
                 

                        Forms\Components\Select::make('produitmodel_id')
                            ->label('Produit')
                            ->relationship('produitmodel', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state) {
                                    $produit = produitmodel::find($state);
                                    $set('stock_disponible', $produit->stocks->quantity ?? 0);
                                    $set('prix_unitaire', $produit->price ?? 0);
                                    
                                }
                            }),

                        Forms\Components\TextInput::make('stock_disponible')
                            ->label('Stock Disponible')
                            ->disabled()
                            ->dehydrated(),

                        Forms\Components\TextInput::make('prix_unitaire')
                            ->label('Prix Unitaire')
                            ->disabled()
                            ->dehydrated()
                            ->prefix('$'),
                           ]),

                         Forms\Components\Section::make('Détails de la commande')
                             ->description('Gérez la quantité et calculez le total')
                            ->icon('heroicon-o-shopping-cart')
                            ->columns(2)
                            ->schema([
                        Forms\Components\TextInput::make('quantity')
                            ->label('Quantité')
                            ->required()
                            ->numeric()
                            ->default(1)
                            ->live()
                            ->minValue(1)
                            ->maxValue(fn ($get) => $get('stock_disponible') ?? 0)
                            ->afterStateUpdated(function ($state, callable $set, $get) {
                                    $produit = produitmodel::find($get('produitmodel_id'));
                                    $status = $get('status');
                                      

                                    if (!$produit || !$produit->stocks) {
                                        $set('quantity', 10);
                                        return;
                                    }

                                    $available = $produit->stocks->quantity;

                                    // Calcul du total
                                    $total = $state * $produit->price;
                                    $set('total', $total);

                                    try {
                                        // Vérifier que le paiement est validé
                                        if ($status !== 'paid') {
                                            return; // pas de décrémentation si pas payé
                                        }

                                        // Vérifier la quantité minimale
                                        if ($state <= 0) {
                                            throw new \Exception("La quantité doit être supérieure à zéro.");
                                        }

                                        // Vérifier que le stock est suffisant
                                        if ($state > $available) {
                                            throw new \Exception("Quantité demandée ({$state}) supérieure au stock disponible ({$available}).");
                                        }

                                        // Décrémenter le stock
                                $produit->stocks->quantity = $produit->stocks->quantity - $state;
                                $produit->stocks->save(); 
                                 

                                    } catch (\Exception $e) {
                                        // Remettre la quantité maximale possible
                                        $set('quantity', $available);

                                        // Afficher une notification d'erreur à l'utilisateur
                                        \Filament\Notifications\Notification::make()
                                            ->title('Erreur de stock')
                                            ->body($e->getMessage())
                                            ->danger()
                                            ->send();
                                    }
                            })

                            ->suffixAction(
                                Forms\Components\Actions\Action::make('verifier_stock')
                                    ->icon('heroicon-m-check-circle')
                                    ->tooltip('Vérifier le stock disponible')
                                    ->action(function ($state, $record, $set) {
                                        if (!$record?->produitmodel?->stocks) {
                                            \Filament\Notifications\Notification::make()
                                                ->warning()
                                                ->title('Stock indisponible')
                                                ->body('Aucun stock n\'est disponible pour ce produit.')
                                                ->send();
                                            return;
                                        }

                                        \Filament\Notifications\Notification::make()
                                            ->success()
                                            ->title('Stock disponible')
                                            ->body("Il reste {$record->produitmodel->stocks->quantity} unités en stock.")
                                            ->send();
                                        })
                                     ),

                                Forms\Components\TextInput::make('total')
                                ->label('Total')
                                ->disabled()
                                ->prefix('$')
                                ->numeric()
                                ->dehydrated(),
                        ]),

                Forms\Components\Section::make('Informations de paiement')
                    ->description('Configurez les détails du paiement')
                    ->icon('heroicon-o-credit-card')
                    ->columns(2)
                    ->schema([
               Forms\Components\Select::make('payment_method')
                            ->label('Méthode de paiement')
                            ->options([
                                'cash' => 'Espèces',
                                'card' => 'Carte bancaire',
                                'transfer' => 'Virement bancaire',
                                'mobile_money' => 'Mobile Money',
                            ])
                            ->required()
                            ->native(false)
                           ,

                        Forms\Components\Select::make('status')
                            ->label('Statut')
                            ->options([
                                'pending' => 'En attente',
                                'paid' => 'Payé',
                                'failed' => 'Échoué',
                                'refunded' => 'Remboursé',
                            ])
                            ->default('pending')
                            ->required()
                            ->native(false)
                           
                            ->live()
                            ->afterStateUpdated(function ($state, $record) {
                                if ($state === 'paid' && $record) {
                                    // Mettre à jour le stock
                                    $produit = $record->produitmodel;
                                    if ($produit && $produit->stocks) {
                                        $newQuantity = $produit->stocks->quantity - $record->quantity;
                                        if ($newQuantity >= 0) {
                                            $produit->stocks->quantity = $newQuantity;
                                            $produit->stocks->save();

                                            if ($newQuantity <= 10) {
                                                \Filament\Notifications\Notification::make()
                                                    ->warning()
                                                    ->title('Stock bas')
                                                    ->body("Le stock de {$produit->name} est bas ({$newQuantity} restants)")
                                                    ->persistent()
                                                    ->sendToDatabase(auth()->user())
                                                    ->send();
                                            }
                                        }
                                    }
                                }
                            }),

                        Forms\Components\DateTimePicker::make('payment_date')
                            ->label('Date de paiement')
                            ->default(now())
                            ->required(),

                    ]),
            ]);
    }

         public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('client.name')
                    ->label('Client')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('produitmodel.name')
                    ->label('Produit')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('quantity')
                    ->label('Quantité')
                    ->sortable(),
                TextColumn::make('payment_method')
                    ->label('Méthode de paiement')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'paid' => 'success',
                        'failed' => 'danger',
                        'refunded' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'En attente',
                        'paid' => 'Payé',
                        'failed' => 'Échoué',
                        'refunded' => 'Remboursé',
                        default => $state,
                    })
                    ->sortable(),
                TextColumn::make('total')
                    ->label('Total')
                    ->prefix('$')
                    ->sortable()
                    ->formatStateUsing(fn ($state): string => number_format($state, 2)),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayements::route('/'),
            'create' => Pages\CreatePayement::route('/create'),
            'edit' => Pages\EditPayement::route('/{record}/edit'),
        ];
    }

}
