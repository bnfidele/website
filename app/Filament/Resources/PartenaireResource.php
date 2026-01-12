<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartenaireResource\Pages;
use App\Filament\Resources\PartenaireResource\RelationManagers;
use App\Models\partenaire;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartenaireResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = partenaire::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Nos Partenaires';

    protected static ?string $navigationGroup = 'Partenaires';

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

                Forms\Components\Section::make('Informations du Partenaire')
                    ->description('Détails du partenaire')
                    ->icon('heroicon-o-briefcase')
                    ->schema([
                        Forms\Components\TextInput::make('nom')
                            ->label('Nom du Partenaire')
                            ->required()
                            ->maxLength(255)
                            ->live(),

                        Forms\Components\TextInput::make('email')
                            ->label('Email du Partenaire')
                            ->email()
                            ->required()
                            ->unique(partenaire::class, 'email', ignorable: fn (?partenaire $record): ?partenaire => $record)
                            ->maxLength(255)
                            ->live(),

                        Forms\Components\TextInput::make('telephone')
                            ->label('Téléphone du Partenaire')
                            ->required()
                            ->maxLength(20)
                            ->live(),

                        Forms\Components\Textarea::make('adresse')
                            ->label('Adresse du Partenaire')
                            ->required()
                            ->maxLength(500)
                            ->live(),

                        Forms\Components\TextInput::make('site_web')
                            ->label('Site Web du Partenaire')
                            ->url()
                            ->required()
                            ->maxLength(255)
                            ->live(),

                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo du Partenaire')
                            ->image()
                            ->disk('public')
                            ->directory('partenaires/logos')
                            ->visibility('public')
                            ->maxSize(1024)
                            ->imagePreviewHeight(250)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                            ->live(),

                        Forms\Components\Select::make('status')
                            ->label('Statut du Partenaire')
                            ->options([
                                'active' => 'Actif',
                                'inactive' => 'Inactif',
                                'pending' => 'En attente',
                                'suspended' => 'Suspendu',
                                'archived' => 'Archivé',
                            ])
                            ->default('active')
                            ,
                               
                    Forms\Components\Textarea::make('note')
                        ->label('Une Note sur le Partenaire')
                        ->nullable()
                            ->maxLength(500)
                            ->live(),
                    ]),

                 

            //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')
                    ->label('Nom du Partenaire')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('telephone')
                    ->label('Téléphone')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('adresse')
                    ->label('Adresse')
                    ->limit(50)
                    ->sortable(),

                Tables\Columns\TextColumn::make('site_web')
                    ->label('Site Web')
                    ->sortable(),


                Tables\Columns\TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'active',
                        'danger' => 'suspended',
                        'gray' => ['inactive', 'archived'],
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'active' => 'Actif',
                        'inactive' => 'Inactif',
                        'pending' => 'En attente',
                        'suspended' => 'Suspendu',
                        'archived' => 'Archivé',
                        default => $state,
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('pdf')
                    ->label('PDF')
                    ->color('success')
                    ->icon('heroicon-o-document-arrow-down')
                    ->url(fn (partenaire $record): string => route('partenaire.pdf', $record))
                    ->openUrlInNewTab()
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
            RelationManagers\PrixPartenaireRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartenaires::route('/'),
            'create' => Pages\CreatePartenaire::route('/create'),
            'edit' => Pages\EditPartenaire::route('/{record}/edit'),
        ];
    }
}
