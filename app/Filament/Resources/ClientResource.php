<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\table;

class ClientResource extends Resource
{
    protected static ?string $model = client::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }

    protected static ?string $navigationGroup = 'Clients';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations Personnelles')
                    ->description('Informations de base du client')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Nom du client')
                            ->placeholder('Entrez le nom complet')
                            ->live()
                            ->autofocus(),

                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->email()
                            ->unique(client::class, 'email', ignorable: fn (?client $record): ?client => $record)
                            ->maxLength(255)
                            ->label('Email')
                            ->placeholder('exemple@email.com')
                            ->prefix('@')
                            ->suffixIcon('heroicon-m-envelope'),

                        Forms\Components\TextInput::make('phone')
                            ->required()
                            ->maxLength(15)
                            ->label('Téléphone')
                            ->placeholder('+243 XX XXX XXXX')
                            ->tel()
                            ->suffixIcon('heroicon-m-phone')
                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                            ->helperText('Format international recommandé'),
                    ])->columns(2),

                Forms\Components\Section::make('Adresse')
                    ->description('Localisation du client')
                    ->icon('heroicon-o-map-pin')
                    ->schema([
                        Forms\Components\Textarea::make('address')
                            ->required()
                            ->maxLength(500)
                            ->label('Adresse complète')
                            ->placeholder('Numéro, rue, ville, pays...')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Préférences')
                    ->description('Paramètres de communication')
                    ->icon('heroicon-o-cog')
                    ->schema([
                        Forms\Components\Toggle::make('notifications_email')
                            ->label('Notifications par email')
                            ->default(true)
                            ->helperText('Recevoir des notifications par email'),

                        Forms\Components\Toggle::make('notifications_sms')
                            ->label('Notifications par SMS')
                            ->default(true)
                            ->helperText('Recevoir des notifications par SMS'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Nom')
                    ->description(fn ($record): string => $record->email)
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->label('Email')
                    ->icon('heroicon-m-envelope')
                    ->copyable()
                    ->copyMessage('Email copié!')
                    ->copyMessageDuration(1500),

                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable()
                    ->label('Téléphone')
                    ->icon('heroicon-m-phone')
                    ->copyable()
                    ->copyMessage('Numéro copié!')
                    ->copyMessageDuration(1500),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Client depuis')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('notifications_email')
                    ->label('Email')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->toggleable(),

                Tables\Columns\IconColumn::make('notifications_sms')
                    ->label('SMS')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('notifications_email')
                    ->label('Notifications Email')
                    ->placeholder('Tous les clients')
                    ->trueLabel('Avec notifications email')
                    ->falseLabel('Sans notifications email'),

                Tables\Filters\TernaryFilter::make('notifications_sms')
                    ->label('Notifications SMS')
                    ->placeholder('Tous les clients')
                    ->trueLabel('Avec notifications SMS')
                    ->falseLabel('Sans notifications SMS'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'view' => Pages\ViewClient::route('/{record}'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
    
    
}
