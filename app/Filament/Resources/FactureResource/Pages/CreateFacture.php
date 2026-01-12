<?php

namespace App\Filament\Resources\FactureResource\Pages;

use App\Filament\Resources\FactureResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateFacture extends CreateRecord
{
    protected static string $resource = FactureResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        // Notification de création réussie
        Notification::make()
            ->title('Facture créée')
            ->success()
            ->body('La facture a été créée avec succès.')
            ->send();
    }
}
