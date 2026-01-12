<?php

namespace App\Filament\Resources\PartenaireResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PartenaireResource;

class PrixPartenaireRelationManager extends RelationManager
{
    protected static string $relationship = 'prixPartenaires';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations de Prix')
                    ->description('Gérez les prix offerts par ce partenaire')
                    ->schema([
                        Forms\Components\TextInput::make('nom_produit')
                            ->label('Nom du Produit')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ex: Détecteur Incendie Pro'),

                        Forms\Components\TextInput::make('description')
                            ->label('Description')
                            ->maxLength(500)
                            ->columnSpanFull()
                            ->placeholder('Détails du produit ou service'),

                        Forms\Components\TextInput::make('prix')
                            ->label('Prix ($)')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->step(0.01)
                            ->prefix('$'),

                        Forms\Components\TextInput::make('prix_remise')
                            ->label('Prix avec Remise ($)')
                            ->numeric()
                            ->minValue(0)
                            ->step(0.01)
                            ->prefix('$')
                            ->helperText('Laisser vide si pas de remise'),

                        Forms\Components\TextInput::make('pourcentage_remise')
                            ->label('Pourcentage Remise (%)')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->step(0.01)
                            ->suffix('%'),

                        Forms\Components\Select::make('type_prix')
                            ->label('Type de Prix')
                            ->options([
                                'unitaire' => 'Prix Unitaire',
                                'pack' => 'Prix Pack',
                                'volume' => 'Prix Volume',
                                'special' => 'Prix Spécial',
                            ])
                            ->required(),

                        Forms\Components\Select::make('categorie')
                            ->label('Catégorie')
                            ->options([
                                'detection' => 'Détection',
                                'extinction' => 'Extinction',
                                'formation' => 'Formation',
                                'cloud' => 'Cloud',
                                'finance' => 'Finance',
                                'autre' => 'Autre',
                            ])
                            ->placeholder('Ex: Détection, Extinction, Formation'),

                        Forms\Components\Select::make('condition_technique')
                            ->label('Condition Technique')
                            ->columnSpanFull()
                            ->placeholder('Spécifications techniques')
                            ->options([
                                'standard' => 'Standard',
                                'personnalise' => 'Personnalisé',
                                'sur_demande' => 'Sur Demande',
                            
                            ]),

                        Forms\Components\TextInput::make('quantite_min')
                            ->label('Quantité Minimum')
                            ->numeric()
                            ->minValue(1)
                            ->helperText('Quantité minimum pour ce prix'),

                        Forms\Components\DatePicker::make('date_debut')
                            ->label('Date de Début')
                            ->required(),

                        Forms\Components\DatePicker::make('date_fin')
                            ->label('Date de Fin')
                            ->helperText('Laisser vide pour un prix permanent'),

                        Forms\Components\Toggle::make('est_actif')
                            ->label('Prix Actif')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nom_produit')
            ->columns([
                Tables\Columns\TextColumn::make('nom_produit')
                    ->label('Produit')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('prix')
                    ->label('Prix')
                    ->money('$')
                    ->sortable(),

                Tables\Columns\TextColumn::make('condition_technique')
                    ->label('Condition Technique')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('categorie')
                    ->label('Catégorie')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('prix_remise')
                    ->label('Prix Remise')
                    ->money('$')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('pourcentage_remise')
                    ->label('Remise %')
                    ->suffix('%')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('type_prix')
                    ->label('Type')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'unitaire' => 'blue',
                        'pack' => 'green',
                        'volume' => 'orange',
                        'special' => 'red',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('quantite_min')
                    ->label('Qté Min')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('date_debut')
                    ->label('Début')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('date_fin')
                    ->label('Fin')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\BooleanColumn::make('est_actif')
                    ->label('Actif')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('est_actif')
                    ->label('Actif'),

                Tables\Filters\SelectFilter::make('type_prix')
                    ->label('Type de Prix')
                    ->options([
                        'unitaire' => 'Prix Unitaire',
                        'pack' => 'Prix Pack',
                        'volume' => 'Prix Volume',
                        'special' => 'Prix Spécial',
                    ]),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Ajouter un Prix'),
                Tables\Actions\Action::make('modifier_partenaire')
                    ->label('Modifier Partenaire')
                    ->icon('heroicon-o-pencil-square')
                    ->url(fn() => PartenaireResource::getUrl('edit', ['record' => $this->getOwnerRecord()]))
                    ->openUrlInNewTab()
                    ->color('info'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Modifier'),
                Tables\Actions\DeleteAction::make()
                    ->label('Supprimer'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Créer le premier prix'),
            ]);
    }
}
