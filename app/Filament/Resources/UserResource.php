<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Dompdf\FrameDecorator\Page;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource implements \BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Filament Shield';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel='Utulisateurs';

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
                Section::make('Information de l\'utilisateur')
                ->description('Les informations personnelles de l\'utilisateur')
                ->icon('heroicon-o-information-circle')
                ->columns(2)
                ->id('user-information')
                ->schema([
                 Forms\Components\TextInput::make('name')
                 ->label('Nom complet')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('email')
                ->label('Adresse e-mail')
                ->email()
                ->required()
                ,
                Forms\Components\TextInput::make('password')
                ->password()
                ->required()
                ->dehydrated(fn ($state) => filled($state))
                ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                ->default('admin1234')
                ->dehydrated(fn (?string $state): bool => filled($state))
                ->required(fn (string $operation): bool => $operation === 'create')
                ->label('Mot de passe')
                ->columnSpan(2),
                //
            ]),

            Section::make('Rôles et Permissions')
            ->description('Attribuer des rôles et des permissions à l\'utilisateur')
            ->icon('heroicon-o-shield-check')
            ->columns(2)
            ->id('roles-and-permissions')
            ->schema([
                Forms\Components\Select::make('roles')
                ->label('Rôles')
                ->multiple()
                ->relationship('roles','name')
                ->preload()
                ->columnSpan(2),
                Forms\Components\Select::make('permissions')
                ->label('Permissions')
                ->multiple()
                ->relationship('permissions','name')
                ->preload()
                ->columnSpan(2),
            ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nom')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->label('E-mail')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('roles.name')->label('Rôles')->sortable()->wrap()->limit(50),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y à H:i:s')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Mis à jour le')
                    ->dateTime('d/m/Y à H:i:s')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
               
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
