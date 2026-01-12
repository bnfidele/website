<?php

namespace App\Filament\Resources\ProduitresourceResource\Pages;

use App\Filament\Resources\ProduitresourceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduitresource extends EditRecord
{
    protected static string $resource = ProduitresourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
