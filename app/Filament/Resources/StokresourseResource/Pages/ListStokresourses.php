<?php

namespace App\Filament\Resources\StokresourseResource\Pages;

use App\Filament\Resources\StokresourseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStokresourses extends ListRecords
{
    protected static string $resource = StokresourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
