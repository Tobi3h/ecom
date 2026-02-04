<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Créer les rôles de base (sans permissions complexes pour le moment)

        // ADMIN - Gestion complète du système
        Role::create(['name' => 'admin', 'guard_name' => 'web']);

        // CLIENT - Utilisateur standard
        Role::create(['name' => 'client', 'guard_name' => 'web']);

        $this->command->info('Roles created successfully! (admin, client)');
        $this->command->info('Note: Les commandes peuvent être passées sans compte utilisateur.');
    }
}
