<?php

namespace App\Filament\Resources\FactureResource\Pages;

use App\Filament\Resources\FactureResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\Action;
use Barryvdh\DomPDF\Facade\Pdf;

class ViewFacture extends ViewRecord
{
    protected static string $resource = FactureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('download')
                ->label('Télécharger PDF')
                ->icon('heroicon-o-document')
                ->action(function () {
                    $pdf = Pdf::loadView('pdf.facture', [
                        'facture' => $this->record
                    ]);
                    
                    // Assurez-vous que le répertoire existe
                    if (!file_exists(storage_path('app/public/factures'))) {
                        mkdir(storage_path('app/public/factures'), 0755, true);
                    }
                    
                    $pdfPath = storage_path("app/public/factures/facture-{$this->record->numero_facture}.pdf");
                    $pdf->save($pdfPath);
                    
                    return response()->download($pdfPath);
                }),
            
            EditAction::make()
                ->label('Modifier'),
                
            DeleteAction::make()
                ->label('Supprimer'),
        ];
    }
}
