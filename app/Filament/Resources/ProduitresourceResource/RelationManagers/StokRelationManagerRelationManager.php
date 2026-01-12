<?php

namespace App\Filament\Resources\ProduitresourceResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StokRelationManagerRelationManager extends RelationManager
{
    protected static string $relationship = 'stocks';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('quantity')
                    ->label('Quantité du produit')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('price')
                    ->label('prix unitaire d\'achat')
                    ->required()
                    ->maxLength(255),

            
                Forms\Components\DatePicker::make('expiry_date')
                    ->label('date d\'expiration')
                    ->required(), // Format de date et heure

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('quantity')
            ->columns([
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Quantité du produit'),
                Tables\Columns\TextColumn::make('price')
                  ->label('Prix unitaire d\' achat devise ($)'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date de création du produit')
                    ->dateTime('d/m/Y H:i'), // Format de date et heure

                    Tables\Columns\TextColumn::make('expiry_date')
                    ->label('Date d\'expiration')
                    ->date('d/m/Y')
                    ->since(), // Format de date
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
