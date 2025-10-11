<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Crear permisos
        $permissions = [
            'manage users',
            'view users',
            'create users',
            'edit users',
            'delete users',
            'manage proyectos',
            'view proyectos',
            'create proyectos',
            'edit proyectos',
            'delete proyectos',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Asignar permisos a roles
        $adminRole->givePermissionTo(Permission::all());

        // Asignar a usuario admin el rol admin
        $adminUser = User::where('email', 'admin@example.com')->first();
        $adminUser->assignRole($adminRole);
    }
}
