<?php

namespace App\Filament\Widgets;

use App\Models\client;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Carbon;

class tableadmin extends BaseWidget
{
    protected static ?string $heading = 'Clients Actifs';
   
    public function table(Table $table): Table
    {
        return $table
            ->query(
                client::query()
                ->whereHas('payements', function ($query) {
                    $query->where('created_at', '>=', Carbon::now()->subDays(30));
                })
                ->withCount('payements')
                ->withSum('payements', 'total')
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom du client')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->icon('heroicon-m-envelope'),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Téléphone')
                    ->searchable()
                    ->icon('heroicon-m-phone'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Dernière activité')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->color(fn ($record) => 
                        $record->updated_at->isToday() ? 'success' : 
                        ($record->updated_at->isYesterday() ? 'warning' : 'danger')
                    ),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                Tables\Filters\Filter::make('active_this_month')
                    ->label('Actifs ce mois')
                    ->default()
                    ->query(fn ($query) => $query->whereHas('payements', function ($query) {
                        $query->whereMonth('created_at', Carbon::now()->month);
                    })),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn ($record) => route('filament.admin.resources.clients.view', $record))
                    ->label('Voir le profil')
                    ->icon('heroicon-m-eye'),
            ]);
    }
}
