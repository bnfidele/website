<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FactureResource\Pages;
use App\Models\facture;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;

class FactureResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = facture::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Factures';
    protected static ?string $navigationGroup = 'Finance';
    protected static ?int $navigationSort = 2;


    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
            'publish'
        ];
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations Client')
                    ->description('Sélectionnez le client et le paiement associé')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Forms\Components\Select::make('client_id')
                            ->label('Client')
                            ->relationship('client', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->afterStateUpdated(fn ($state, $set) => $set('payement_id', null)),

                        Forms\Components\Select::make('payement_id')
                            ->label('Paiement associé')
                            ->relationship('payement', 'id', function (Builder $query, $get) {
                                return $query->where('client_id', $get('client_id'))
                                           ->where('status', 'paid');
                            })
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, $set) {
                                if ($state) {
                                    $payment = \App\Models\payement::find($state);
                                    if ($payment) {
                                        $set('montant_total', $payment->total);
                                        
                                        // Génération d'un numéro de facture unique
                                        $latestFacture = \App\Models\facture::orderBy('id', 'desc')->first();
                                        $counter = $latestFacture ? (int)substr($latestFacture->numero_facture, -6) + 1 : 1;
                                        $set('numero_facture', 'FAC-' . str_pad($counter, 6, '0', STR_PAD_LEFT));
                                        
                                        $set('produit_info', $payment->produitmodel ? [
                                            'nom' => $payment->produitmodel->name,
                                            'prix' => $payment->produitmodel->price,
                                            'quantite' => $payment->quantity,
                                        ] : null);
                                    }
                                }
                            })
                            ->helperText('Seuls les paiements validés sont disponibles'),

                        Forms\Components\Section::make('Détails du produit')
                            ->schema([
                                Forms\Components\TextInput::make('produit_info.nom')
                                    ->label('Produit')
                                    ->required()
                                    ->readOnly()
                                    ->dehydrated(),
                                Forms\Components\TextInput::make('produit_info.prix')
                                    ->label('Prix unitaire')
                                    ->prefix('$')
                                    ->required()
                                    ->numeric()
                                    ->readOnly()
                                    ->dehydrated(),
                                Forms\Components\TextInput::make('produit_info.quantite')
                                    ->label('Quantité')
                                    ->required()
                                    ->numeric()
                                    ->readOnly()
                                    ->dehydrated(),
                            ])
                            ->columns(3)
                            ->visible(fn ($get) => $get('payement_id') !== null),
                    ])->columns(2),

                Forms\Components\Section::make('Détails de la facture')
                    ->description('Informations de facturation')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Forms\Components\TextInput::make('numero_facture')
                            ->label('Numéro de facture')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->placeholder('Généré automatiquement'),

                        Forms\Components\DateTimePicker::make('date_facture')
                            ->label('Date de facturation')
                            ->default(now())
                            ->required()
                            ->live()
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('montant_total')
                            ->label('Montant total')
                            ->disabled()
                            ->numeric()
                            ->prefix('$')
                            ->dehydrated(true)
                            ->live()
                            ->afterStateUpdated(function ($state, $set) {
                                // Mise à jour automatique en cas de changement
                                if ($state) {
                                    $set('status', $state > 0 ? 'draft' : 'cancelled');
                                }
                            }),

                        Forms\Components\Select::make('status')
                            ->label('Statut')
                            ->options([
                                'draft' => 'Brouillon',
                                'sent' => 'Envoyée',
                                'paid' => 'Payée',
                                'cancelled' => 'Annulée',
                            ])
                            ->default('draft')
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, $set, $get) {
                                // Actions automatiques selon le statut
                                if ($state === 'cancelled') {
                                    $set('notes', $get('notes') . "\nFacture annulée le " . now()->format('d/m/Y H:i'));
                                } elseif ($state === 'paid') {
                                    $set('notes', $get('notes') . "\nPaiement reçu le " . now()->format('d/m/Y H:i'));
                                } elseif ($state === 'sent') {
                                    $set('notes', $get('notes') . "\nFacture envoyée le " . now()->format('d/m/Y H:i'));
                                }
                            }),

                        Forms\Components\Textarea::make('notes')
                            ->label('Notes')
                            ->placeholder('Ajoutez des notes à la facture...')
                            ->columnSpanFull()
                            ->live()
                            ->afterStateUpdated(function ($state, $set, $get) {
                                // Vérification de la longueur des notes
                                if (strlen($state) > 500) {
                                    $set('notes', substr($state, 0, 500));
                                }
                            }),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('numero_facture')
                    ->label('Numéro')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('client.name')
                    ->label('Client')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('date_facture')
                    ->label('Date')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('montant_total')
                    ->label('Montant')
                    ->money('USD')
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Statut')
                    ->colors([
                        'warning' => 'draft',
                        'primary' => 'sent',
                        'success' => 'paid',
                        'danger' => 'cancelled',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'draft' => 'Brouillon',
                        'sent' => 'Envoyée',
                        'paid' => 'Payée',
                        'cancelled' => 'Annulée',
                        default => $state,
                    })
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Statut')
                    ->options([
                        'draft' => 'Brouillon',
                        'sent' => 'Envoyée',
                        'paid' => 'Payée',
                        'cancelled' => 'Annulée',
                    ]),

                Tables\Filters\Filter::make('date_facture')
                    ->form([
                        Forms\Components\DatePicker::make('date_from')
                            ->label('Du'),
                        Forms\Components\DatePicker::make('date_until')
                            ->label('Au'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['date_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('date_facture', '>=', $date),
                            )
                            ->when(
                                $data['date_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('date_facture', '<=', $date),
                            );
                    })
            ])
            ->actions([
                ViewAction::make()
                    ->label('Voir')
                    ->icon('heroicon-o-eye')
                    ->url(fn (facture $record): string => route('filament.admin.resources.factures.view', $record)),
                
                DeleteAction::make()
                    ->label('Supprimer')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFactures::route('/'),
            'create' => Pages\CreateFacture::route('/create'),
            'edit' => Pages\EditFacture::route('/{record}/edit'),
            'view' => Pages\ViewFacture::route('/{record}'),
        ];
    }
}
