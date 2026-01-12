<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateSuperAdminRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * php artisan make:super-admin
     */
    protected $signature = 'make:super-admin {--user=}';

    /**
     * The console command description.
     */
    protected $description = 'Créer le rôle Super Admin et l’assigner à un utilisateur si fourni';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Vérifie si le rôle existe déjà
        $role = Role::firstOrCreate(['name' => 'super-admin']);

        // Optionnel : donner toutes les permissions existantes
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);

        $this->info("✅ Rôle 'super-admin' créé ou déjà existant.");

        // Si un user ID est passé
        if ($this->option('user')) {
            $userModel = config('auth.providers.users.model');
            $user = $userModel::find($this->option('user'));

            if ($user) {
                $user->assignRole($role);
                $this->info("👤 Utilisateur #{$user->id} a reçu le rôle Super Admin.");
            } else {
                $this->error("❌ Utilisateur introuvable.");
            }
        }
    }
}
