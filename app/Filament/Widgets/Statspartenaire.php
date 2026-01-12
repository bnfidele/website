<?php

namespace App\Filament\Widgets;

use App\Models\partenaire;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Statspartenaire extends BaseWidget
{
    // Rafraîchir le widget toutes les 30 secondes
    protected static ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        // Récupérer les statistiques
        $totalPartenaires = partenaire::count();
        $partenairesActifs = partenaire::where('status', 'active')->count();
        $partenairesInactifs = partenaire::where('status', 'inactive')->count();
        $partenairesSuspendus = partenaire::where('status', 'suspended')->count();

        // Calculer les pourcentages
        $pourcentageActifs = $totalPartenaires > 0 ? round(($partenairesActifs / $totalPartenaires) * 100) : 0;
        $pourcentageInactifs = $totalPartenaires > 0 ? round(($partenairesInactifs / $totalPartenaires) * 100) : 0;
        $pourcentageSuspendus = $totalPartenaires > 0 ? round(($partenairesSuspendus / $totalPartenaires) * 100) : 0;

        return [
            Stat::make('Partenaires Total', $totalPartenaires)
                ->description('Total des partenaires enregistrés')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),

            Stat::make('Partenaires Actifs', $partenairesActifs)
                ->description($pourcentageActifs . '% du total')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Partenaires Inactifs', $partenairesInactifs)
                ->description($pourcentageInactifs . '% du total')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),

            Stat::make('Partenaires Suspendus', $partenairesSuspendus)
                ->description($pourcentageSuspendus . '% du total')
                ->descriptionIcon('heroicon-m-pause-circle')
                ->color('warning')
        ];
    }
}
