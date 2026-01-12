<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConfigResource\Pages;
use App\Filament\Resources\ConfigResource\RelationManagers;
use App\Models\config;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConfigResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model =config::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Parametrage';
    protected static ?int $navigationSort = 100;

    protected static ?string $navigationLabel = 'Configuration';

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
                Section::make('Coordonnées')
                ->icon('heroicon-o-phone')
                ->description('Gérer les coordonnées de contact de l\'entreprise')
                    ->schema([
                        Forms\Components\TextInput::make('phone')
                            ->label('Téléphone')
                            ->tel()
                            ->required()
                            ->maxLength(15),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address')
                            ->label('Adresse')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(3),
                Section::make('Réseaux Sociaux')
                ->icon('heroicon-o-share')
                ->description('Gérer les liens des réseaux sociaux de l\'entreprise')
                    ->schema([
                        Forms\Components\TextInput::make('facebook')
                            ->label('Facebook')
                            ->url()
                            ->nullable()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('twitter')
                            ->label('Twitter')
                            ->url()
                            ->nullable()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('linkedin')
                            ->label('LinkedIn') 
                            ->url()
                            ->nullable()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('whatsapp')
                            ->label('WhatsApp')
                            ->url()
                            ->nullable()
                            ->maxLength(255),
                    ])
                    ->columns(2),


                    Section::make('Meta')
                    ->icon('heroicon-o-clipboard-document-list')
                    ->description('Informations pour les moteurs de recherche')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->required()
                            ->placeholder('Description de l\'entreprise')
                            ->maxLength(255)
                            ->columnSpanFull(),

                            
                            Forms\Components\TextInput::make('hauteur')
                            ->label('Auteur')
                            ->required()
                            ->placeholder('L\' auteur de l\'entreprise')
                            ->maxLength(255)
                            ->columnSpanFull(),
                              Forms\Components\TextInput::make('title')
                            ->label('Le Nom')
                            ->required()
                            ->placeholder('Le Nom de l\'entreprise')
                            ->maxLength(255)
                            ->columnSpanFull(),
                            Forms\Components\Select::make('key')
                            ->label('mot cle')
                            ->options([
                            'flamx' => 'flamx',
                            'flame x'=>'flame x',
                            'flamex' => 'flamex',
                            'flame'=>'flame',
                            'sentinell feu' => 'sentinell feu',
                            'extincteur' => 'Extincteur',
                            'détecteur fumée' => 'Détecteur de fumée',
                            'alarme incendie' => 'Alarme incendie',
                            'sprinkler' => 'Sprinkler',
                            'protection maison' => 'Protection maison',
                            'sécurité entreprise' => 'Sécurité entreprise',
                            'système anti-feu' => 'Système anti-feu',
                            'prévention incendie' => 'Prévention incendie',
                            'urgence incendie' => 'Urgence incendie',
                            'RDC' => 'RDC',
                            'Afrique' => 'Afrique',
                            'capteurs électroniques' => 'Capteurs électroniques',
                        ])
                            ->placeholder('Key')
                            ->multiple()
                       
                            ->columnSpanFull(),
                    ])->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListConfigs::route('/'),
            'create' => Pages\CreateConfig::route('/create'),
            'edit' => Pages\EditConfig::route('/{record}/edit'),
        ];
    }
}
