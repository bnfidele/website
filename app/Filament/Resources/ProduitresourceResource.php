<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProduitresourceResource\Pages;
use App\Filament\Resources\ProduitresourceResource\RelationManagers;
use App\Models\produitmodel;
use App\Models\Produitresource;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProduitresourceResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = produitmodel::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    
     protected static ?string $navigationLabel = 'Produits';
    protected static ?string $navigationGroup = 'Stock';

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
                Forms\Components\Section::make('Image du produit')
                    ->description('Téléchargez une image représentative du produit')
                    ->icon('heroicon-o-camera')
                    ->schema([
                        FileUpload::make('photo')
                            ->label('Photo du produit')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('product_images')
                            ->visibility('public')
                            ->maxSize(1024)
                            ->imagePreviewHeight('250')
                            ->circleCropper()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                            ->helperText('Format acceptés : JPG, PNG, GIF. Taille max : 1MB')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Informations de base')
                    ->description('Détails essentiels du produit')
                    ->icon('heroicon-o-shopping-bag')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nom du produit')
                            ->required()
                            ->maxLength(255)
                            ->live()
                            ->placeholder('Ex: Ordinateur portable HP')
                            ->suffixIcon('heroicon-m-tag')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (TextInput $component, ?string $state, callable $set) {
                                if ($state) {
                                    $set('slug', Str::slug($state));
                                }
                            }),
                        Forms\Components\TextInput::make('price')
                            ->label('Prix unitaire')
                            ->required()
                            ->numeric()
                            ->prefix('$')
                            ->minValue(0)
                            ->placeholder('0.00')
                            ->live()
                            ->suffix('USD'),

                        Forms\Components\TextInput::make('min_stock')
                            ->label('Stock minimum')
                            ->required()
                            ->numeric()
                            ->default(25)
                            ->minValue(1)
                            ->live()
                            ->suffix('unités')
                            ->helperText('Seuil d\'alerte de stock bas'),

                        Forms\Components\Select::make('unit')
                            ->label('Unité de mesure')
                            ->options([
                                'Pièces' => 'Pièces',
                                'Kilogrammes' => 'Kilogrammes',
                                'Litres' => 'Litres',
                                'Boîtes' => 'Boîtes',
                            ])
                            ->default('Pièces')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->live(),
                    ])->columns(2),

                Forms\Components\Section::make('Détails additionnels')
                    ->description('Informations complémentaires')
                    ->icon('heroicon-o-clipboard-document-list')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Description du produit')
                            ->required()
                            ->placeholder('Décrivez les caractéristiques du produit...')
                            ->helperText('Une description détaillée aide les clients à mieux comprendre le produit')
                            ->maxLength(500)
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('user_name')
                            ->label('Créé par')
                            ->default(fn () => auth()->user()->name)
                            ->disabled()
                            ->dehydrated()
                            ->suffixIcon('heroicon-m-user'),

                        Forms\Components\Hidden::make('user_id')
                            ->default(fn () => auth()->id()),
                    ])->collapsible(),

                Section::make('Meta')
                    ->description('Informations pour les moteurs de recherche')
                    ->icon('heroicon-o-clipboard-document-list')
                    ->schema([

                            TextInput::make('slug')
                                ->label('Meta-titre')
                                ->required()
                                ->dehydrated()
                                ->placeholder('Titre pour les moteurs de recherche')
                       
                                ->columnSpanFull(),

                        Forms\Components\Textarea::make('meta_description')
                            ->label('Meta-description')
                            ->required()
                            ->placeholder('Description du produit')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        
                    ])->collapsible(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom du produit')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn ($record) => \Illuminate\Support\Str::limit($record->description, 50)),

                Tables\Columns\TextColumn::make('price')
                    ->label('Prix')
                    ->sortable()
                    ->money('USD')
                    ->alignRight()
                    ->color('success'),

                Tables\Columns\TextColumn::make('min_stock')
                    ->label('Stock minimum')
                    ->badge()
                    ->alignCenter()
                    ->color(fn ($record) => $record->min_stock < 10 ? 'danger' : 'success'),

                Tables\Columns\TextColumn::make('unit')
                    ->label('Unité')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Créé par')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-m-user')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('unit')
                    ->label('Unité de mesure')
                    ->options([
                        'Pièces' => 'Pièces',
                        'Kilogrammes' => 'Kilogrammes',
                        'Litres' => 'Litres',
                        'Boîtes' => 'Boîtes',
                    ]),
                
                Tables\Filters\Filter::make('price_range')
                    ->form([
                        Forms\Components\TextInput::make('price_from')
                            ->label('Prix minimum')
                            ->numeric()
                            ->prefix('$'),
                        Forms\Components\TextInput::make('price_to')
                            ->label('Prix maximum')
                            ->numeric()
                            ->prefix('$'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['price_from'],
                                fn (Builder $query, $price): Builder => $query->where('price', '>=', $price),
                            )
                            ->when(
                                $data['price_to'],
                                fn (Builder $query, $price): Builder => $query->where('price', '<=', $price),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Voir')
                    ->icon('heroicon-m-eye'),
                    
                Tables\Actions\EditAction::make()
                    ->label('Modifier')
                    ->icon('heroicon-m-pencil'),
                    
                Tables\Actions\DeleteAction::make()
                    ->label('Supprimer')
                    ->icon('heroicon-m-trash'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Supprimer la sélection'),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\StokRelationManagerRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduitresources::route('/'),
            'create' => Pages\CreateProduitresource::route('/create'),
            'edit' => Pages\EditProduitresource::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
            return ['name', 'user.name','unit'];
    }

    
}
