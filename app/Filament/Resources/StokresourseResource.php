<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StokresourseResource\Pages;
use App\Filament\Resources\StokresourseResource\RelationManagers;
use App\Models\stockmodel;
use App\Models\Stokresourse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StokresourseResource extends Resource implements \BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions
{
    protected static ?string $model = stockmodel::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationGroup = 'Stock';

    protected static ?string $navigationLabel = 'Gestion de stocks';

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
                Forms\Components\Section::make('Informations Produit')
                    ->description('Détails du produit en stock')
                    ->icon('heroicon-o-shopping-bag')
                    ->schema([
                        Forms\Components\Select::make('produitmodel_id')
                            ->label('Nom du produit')
                            ->relationship('produitmodel', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('quantity')
                            ->label('Quantité')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->live()
                            ->suffix('unités')
                            ->hint('Stock disponible')
                            ->helperText('Entrez la quantité disponible en stock'),

                        Forms\Components\TextInput::make('price')
                            ->label('Prix unitaire')
                            ->required()
                            ->numeric()
                            ->prefix('$')
                            ->minValue(0)
                            ->live()
                            ->afterStateUpdated(function ($state, $get, $set) {
                                if ($state && $get('quantity')) {
                                    $total = $state * $get('quantity');
                                    $set('total_value', $total);
                                }
                            }),

                        Forms\Components\TextInput::make('total_value')
                            ->label('Valeur totale')
                            ->disabled()
                            ->prefix('$')
                            ->numeric()
                            ->dehydrated(false),
                    ])->columns(2),

                Forms\Components\Section::make('Dates et Statut')
                    ->description('Informations temporelles')
                    ->icon('heroicon-o-calendar')
                    ->schema([
                        Forms\Components\DatePicker::make('expiry_date')
                            ->label('Date d\'expiration')
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, $set) {
                                if ($state) {
                                    $daysUntilExpiry = now()->diffInDays($state, false);
                                    if ($daysUntilExpiry < 30) {
                                        $set('status', 'Expiration proche');
                                    } else {
                                        $set('status', 'Normal');
                                    }
                                }
                            })
                            ->hint(fn ($state) => $state ? 'Expire dans ' . now()->diffInDays($state) . ' jours' : '')
                            ->markAsRequired(),

                        Forms\Components\TextInput::make('status')
                            ->label('Statut du stock')
                            ->disabled()
                            ->dehydrated(false)
                            ->default('Normal'),
                    ])->columns(2),
            ]);
                
        
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('produitmodel.name')
                    ->label('Nom du produit')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('quantity')
                    ->label('Quantité')
                    ->sortable()
                    ->alignCenter()
                    ->suffix(' unités')
                    ->color(fn (string $state): string => $state < 10 ? 'danger' : 'success'),

                Tables\Columns\TextColumn::make('price')
                    ->label('Prix unitaire')
                    ->sortable()
                    ->money('USD')
                    ->alignRight(),

                Tables\Columns\TextColumn::make('total_value')
                    ->label('Valeur totale')
                    ->state(fn ($record): float => $record->quantity * $record->price)
                    ->money('USD')
                    ->alignRight()
                    ->sortable(),

                Tables\Columns\TextColumn::make('expiry_date')
                    ->label('Date d\'expiration')
                    ->date('d/m/Y')
                    ->sortable()
                    ->color(fn ($record) => 
                        now()->diffInDays($record->expiry_date, false) < 30 ? 'danger' : 
                        (now()->diffInDays($record->expiry_date, false) < 90 ? 'warning' : 'success')
                    ),

                Tables\Columns\TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => 
                        match ($state) {
                            'Normal' => 'success',
                            'Expiration proche' => 'danger',
                            default => 'warning',
                        }
                    ),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Statut')
                    ->options([
                        'Normal' => 'Normal',
                        'Expiration proche' => 'Expiration proche',
                    ]),
                Tables\Filters\Filter::make('low_stock')
                    ->label('Stock faible')
                    ->query(fn (Builder $query) => $query->where('quantity', '<', 10)),
                Tables\Filters\Filter::make('expiring_soon')
                    ->label('Expiration proche')
                    ->query(fn (Builder $query) => $query->whereDate('expiry_date', '<=', now()->addDays(30))),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Modifier')
                    ->icon('heroicon-o-pencil'),
                Tables\Actions\DeleteAction::make()
                    ->label('Supprimer')
                    ->icon('heroicon-o-trash'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Supprimer la sélection'),
                ]),
            ])
            ->defaultSort('expiry_date', 'asc');
    }

    public static function getRelations(): array
    {
        return [
           
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStokresourses::route('/'),
            'create' => Pages\CreateStokresourse::route('/create'),
            'edit' => Pages\EditStokresourse::route('/{record}/edit'),
        ];
    }
}
