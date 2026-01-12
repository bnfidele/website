<?php

namespace App\Filament\Widgets;

use App\Models\payement;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class chartadmin extends ChartWidget
{
    protected static ?string $heading = 'Évolution des Paiements';
    

    protected function getData(): array
    {
        $data = collect();
        $labels = collect();
        
        // Récupérer les données des 30 derniers jours
        for ($i = 30; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $labels->push($date->format('d/m'));
            
            // Paiements en attente
            $pending = payement::whereDate('created_at', $date)
                ->where('status', 'pending')
                ->count();
                
            // Paiements validés
            $paid = payement::whereDate('created_at', $date)
                ->where('status', 'paid')
                ->count();

            // Montant total des paiements
            $total = payement::whereDate('created_at', $date)
                ->where('status', 'paid')
                ->sum('total');
                
            $data->push([
                'pending' => $pending,
                'paid' => $paid,
                'total' => $total
            ]);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Paiements en attente',
                    'data' => $data->pluck('pending'),
                    'borderColor' => '#f97316',
                    'backgroundColor' => 'rgba(249, 115, 22, 0.1)',
                    'fill' => true,
                ],
                [
                    'label' => 'Paiements validés',
                    'data' => $data->pluck('paid'),
                    'borderColor' => '#22c55e',
                    'backgroundColor' => 'rgba(34, 197, 94, 0.1)',
                    'fill' => true,
                ],
                [
                    'label' => 'Montant total ($)',
                    'data' => $data->pluck('total'),
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'fill' => true,
                    'yAxisID' => 'y2',
                ],
            ],
            'labels' => $labels->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'title' => [
                        'display' => true,
                        'text' => 'Nombre de paiements'
                    ],
                ],
                'y2' => [
                    'position' => 'right',
                    'beginAtZero' => true,
                    'title' => [
                        'display' => true,
                        'text' => 'Montant total ($)'
                    ],
                ],
            ],
            'elements' => [
                'line' => [
                    'tension' => 0.3, // Lisse légèrement les courbes
                ],
            ],
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
            ],
        ];
    }
}
