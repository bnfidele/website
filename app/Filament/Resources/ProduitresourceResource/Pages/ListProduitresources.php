<?php

namespace App\Filament\Resources\ProduitresourceResource\Pages;

use App\Filament\Resources\ProduitresourceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProduitresources extends ListRecords
{
    protected static string $resource = ProduitresourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
