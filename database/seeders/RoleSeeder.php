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
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $viewerRole = Role::firstOrCreate(['name' => 'viewer']);

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
            'manage entidades',
            'view entidades',
            'create entidades',
            'edit entidades',
            'delete entidades',
            'manage reports',
            'view reports',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Asignar permisos a roles
        $adminRole->givePermissionTo(Permission::all());
        
        $managerRole->givePermissionTo([
            'manage proyectos', 'view proyectos', 'create proyectos', 'edit proyectos',
            'manage entidades', 'view entidades', 'create entidades', 'edit entidades',
            'view users', 'manage reports', 'view reports'
        ]);

        $editorRole->givePermissionTo([
            'view proyectos', 'create proyectos', 'edit proyectos',
            'view entidades', 'create entidades', 'edit entidades',
            'view users', 'view reports'
        ]);

        $viewerRole->givePermissionTo([
            'view proyectos', 'view entidades', 'view users', 'view reports'
        ]);

        // Asignar a usuario admin el rol admin
        $adminUser = User::where('email', 'admin@example.com')->first();
        if($adminUser) {
            $adminUser->assignRole($adminRole);
        }
    }
}
