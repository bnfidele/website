<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <--- CETTE LIGNE CORRIGE L'ERREUR

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Sur Vercel, l'environnement passe en HTTPS natif
        if (config('app.env') === 'production' || getenv('VERCEL')) {
            URL::forceScheme('https');
        }
    }
}
