<?php

namespace App\Filament\Resources\StokresourseResource\Pages;

use App\Filament\Resources\StokresourseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStokresourse extends EditRecord
{
    protected static string $resource = StokresourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
