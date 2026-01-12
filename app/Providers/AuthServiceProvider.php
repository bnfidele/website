<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\client;
use App\Models\config;
use App\Models\facture;
use App\Models\partenaire;
use App\Models\payement;
use App\Models\produitmodel;
use App\Models\stockmodel;
use App\Models\User;
use App\Policies\clientpolicy;
use App\Policies\configpolicy;
use App\Policies\facturepolicy;
use App\Policies\partenairepolicy;
use App\Policies\payemaentpolicy;
use App\Policies\produitpolicy;
use App\Policies\stockpolicy;
use App\Policies\userpolisy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class=>userpolisy::class,
        config::class=>configpolicy::class,
        payement::class=>payemaentpolicy::class,
        stockmodel::class=>stockpolicy::class,
        produitmodel::class=>produitpolicy::class,
        client::class=>clientpolicy::class,
        partenaire::class=>partenairepolicy::class,
        facture::class=>facturepolicy::class,


    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
