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
        // Crear los 4 roles principales del sistema
        $adminRole = Role::firstOrCreate(['name' => 'Administrador']);
        $plannerRole = Role::firstOrCreate(['name' => 'Técnico de Planificación']);
        $auditorRole = Role::firstOrCreate(['name' => 'Auditor']);
        $externalRole = Role::firstOrCreate(['name' => 'Usuario Externo']);

        // Crear permisos basados en las rutas del sistema
        $permissions = [
            // Dashboard
            'view dashboard',
            
            // Gestión de Usuarios
            'manage users',
            'view users',
            'create users',
            'edit users',
            'delete users',
            
            // Gestión de Roles y Permisos
            'manage roles',
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'manage permissions',
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',
            
            // Gestión de Entidades
            'manage entidades',
            'view entidades',
            'create entidades',
            'edit entidades',
            'delete entidades',
            'export entidades',
            
            // Gestión de Unidades Organizacionales
            'manage unidades',
            'view unidades',
            'create unidades',
            'edit unidades',
            'delete unidades',
            'export unidades',
            
            // Gestión de Objetivos Estratégicos
            'manage objetivos estrategicos',
            'view objetivos estrategicos',
            'create objetivos estrategicos',
            'edit objetivos estrategicos',
            'delete objetivos estrategicos',
            'export objetivos estrategicos',
            
            // Gestión de ODS (Objetivos de Desarrollo Sostenible)
            'manage ods',
            'view ods',
            'create ods',
            'edit ods',
            'delete ods',
            
            // Gestión de PND (Plan Nacional de Desarrollo)
            'manage pnd',
            'view pnd',
            'create pnd',
            'edit pnd',
            'delete pnd',
            'export pnd',
            
            // Gestión de Planes
            'manage planes',
            'view planes',
            'create planes',
            'edit planes',
            'delete planes',
            'export planes',
            
            // Gestión de Programas
            'manage programas',
            'view programas',
            'create programas',
            'edit programas',
            'delete programas',
            'export programas',
            
            // Gestión de Proyectos
            'manage proyectos',
            'view proyectos',
            'create proyectos',
            'edit proyectos',
            'delete proyectos',
            
            // Reportes y Monitoreo
            'view reports',
            'generate reports',
            'export reports',
            
            // Actividades Operativas
            'register activities',
            'monitor goals',
            'integrate external systems',
            'assign budgets',
        ];

        // Crear todos los permisos
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // **ADMINISTRADOR** - Acceso completo al sistema
        $adminRole->givePermissionTo(Permission::all());

        // **TÉCNICO DE PLANIFICACIÓN** - Gestión completa de planificación y proyectos
        $plannerRole->givePermissionTo([
            // Dashboard y navegación
            'view dashboard',
            
            // Gestión completa de entidades de planificación
            'manage entidades',
            'view entidades',
            'create entidades',
            'edit entidades',
            'delete entidades',
            'export entidades',
            
            // Gestión de unidades organizacionales
            'manage unidades',
            'view unidades',
            'create unidades',
            'edit unidades',
            'delete unidades',
            'export unidades',
            
            // Objetivos estratégicos
            'manage objetivos estrategicos',
            'view objetivos estrategicos',
            'create objetivos estrategicos',
            'edit objetivos estrategicos',
            'delete objetivos estrategicos',
            'export objetivos estrategicos',
            
            // ODS
            'manage ods',
            'view ods',
            'create ods',
            'edit ods',
            'delete ods',
            
            // PND
            'manage pnd',
            'view pnd',
            'create pnd',
            'edit pnd',
            'delete pnd',
            'export pnd',
            
            // Planes
            'manage planes',
            'view planes',
            'create planes',
            'edit planes',
            'delete planes',
            'export planes',
            
            // Programas
            'manage programas',
            'view programas',
            'create programas',
            'edit programas',
            'delete programas',
            'export programas',
            
            // Proyectos
            'manage proyectos',
            'view proyectos',
            'create proyectos',
            'edit proyectos',
            'delete proyectos',
            
            // Actividades operativas
            'register activities',
            'monitor goals',
            'assign budgets',
            
            // Reportes
            'view reports',
            'generate reports',
            'export reports',
            
            // Ver usuarios (sin gestión)
            'view users',
        ]);

        // **AUDITOR** - Solo lectura y reportes para supervisión
        $auditorRole->givePermissionTo([
            // Dashboard
            'view dashboard',
            
            // Solo visualización de todas las entidades
            'view entidades',
            'view unidades',
            'view objetivos estrategicos',
            'view ods',
            'view pnd',
            'view planes',
            'view programas',
            'view proyectos',
            'view users',
            
            // Reportes completos para auditoría
            'view reports',
            'generate reports',
            'export reports',
            'export entidades',
            'export unidades',
            'export objetivos estrategicos',
            'export pnd',
            'export planes',
            'export programas',
            
            // Monitoreo de metas
            'monitor goals',
        ]);

        // **USUARIO EXTERNO** - Acceso limitado solo a consultas básicas
        $externalRole->givePermissionTo([
            // Dashboard básico
            'view dashboard',
            
            // Solo visualización de información pública
            'view entidades',
            'view unidades',
            'view objetivos estrategicos',
            'view ods',
            'view pnd',
            'view planes',
            'view programas',
            'view proyectos',
            
            // Reportes básicos
            'view reports',
        ]);

        // Asignar rol de administrador al usuario admin
        $adminUser = User::where('email', 'admin@example.com')->first();
        if($adminUser) {
            $adminUser->assignRole($adminRole);
        }

        // Mensaje de confirmación
        $this->command->info('✅ Roles y permisos creados exitosamente:');
        $this->command->info("   - Administrador: " . $adminRole->permissions()->count() . " permisos");
        $this->command->info("   - Técnico de Planificación: " . $plannerRole->permissions()->count() . " permisos");
        $this->command->info("   - Auditor: " . $auditorRole->permissions()->count() . " permisos");
        $this->command->info("   - Usuario Externo: " . $externalRole->permissions()->count() . " permisos");
        $this->command->info("📊 Total de permisos: " . Permission::count());
    }
}
