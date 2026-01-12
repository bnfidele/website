<?php

namespace App\Filament\Widgets;

use App\Models\payement;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class Statsadmin extends BaseWidget
{
    protected function getStats(): array
    {
        // Paiements du jour
        $todayPayments = payement::whereDate('created_at', Carbon::today())
            ->where('status', 'paid');
        $todayCount = $todayPayments->count();
        $todayTotal = $todayPayments->sum('total');

        // Paiements de la semaine
        $weekPayments = payement::whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->where('status', 'paid');
        $weekCount = $weekPayments->count();
        $weekTotal = $weekPayments->sum('total');

        // Tendance sur 7 derniers jours
        $chartData = collect(range(6, 0))->map(function ($days) {
            return payement::whereDate('created_at', Carbon::today()->subDays($days))
                ->where('status', 'paid')
                ->sum('total');
        })->toArray();

        return [
            Stat::make('Paiements aujourd\'hui', $todayCount)
                ->description(number_format($todayTotal, 2) . ' $')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->chart($chartData)
                ->color('success'),
         
            Stat::make('Paiements cette semaine', $weekCount)
                ->description(number_format($weekTotal, 2) . ' $')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('success'),
         
            Stat::make('Moyenne par paiement', number_format($weekTotal / max($weekCount, 1), 2) . ' $')
                ->description($weekCount . ' paiements au total')
                ->descriptionIcon('heroicon-m-calculator')
                ->chart($chartData)
                ->color('info'),
         Stat::make('Paiements Total', number_format(payement::where('status', 'paid')->sum('total'), 2) . ' $')
                ->description(payement::where('status', 'paid')->count() . ' paiements validés')
                ->descriptionIcon('heroicon-m-banknotes')
                ->chart($chartData)
                ->color('primary'),
    ];
    }
 }

