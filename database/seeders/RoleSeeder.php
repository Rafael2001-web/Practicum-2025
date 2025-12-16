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
     * Basado en el documento CASOS_DE_USO.md - Sistema de roles específicos por CRUD
     */
    public function run(): void
    {
        // ==================================================================================
        // CREAR LOS 10 ROLES ESPECÍFICOS DEL SISTEMA SIPEIP 2.0
        // ==================================================================================

        $adminRole = Role::firstOrCreate(['name' => 'Administrador del Sistema']);
        $gestorEntidadesRole = Role::firstOrCreate(['name' => 'Gestor de Entidades']);
        $coordinadorUnidadesRole = Role::firstOrCreate(['name' => 'Coordinador de Unidades']);
        $especialistaOdsRole = Role::firstOrCreate(['name' => 'Especialista en ODS']);
        $planificadorEstrategicoRole = Role::firstOrCreate(['name' => 'Planificador Estratégico']);
        $analistaPndRole = Role::firstOrCreate(['name' => 'Analista de PND']);
        $gestorPlanesRole = Role::firstOrCreate(['name' => 'Gestor de Planes']);
        $revisorInstitucionalRole = Role::firstOrCreate(['name' => 'Revisor Institucional']);
        $coordinadorProgramasRole = Role::firstOrCreate(['name' => 'Coordinador de Programas']);
        $analistaProyectosRole = Role::firstOrCreate(['name' => 'Analista de Proyectos']);
        $supervisorGeneralRole = Role::firstOrCreate(['name' => 'Supervisor General']);

        // ==================================================================================
        // DEFINIR TODOS LOS PERMISOS DEL SISTEMA
        // ==================================================================================

        $permissions = [
            // ===== DASHBOARD =====
            'view dashboard',

            // ===== USUARIOS (Administrador del Sistema) =====
            'manage usuarios',
            'view usuarios',
            'create usuarios',
            'edit usuarios',
            'delete usuarios',

            // ===== ENTIDADES (Gestor de Entidades) =====
            'manage entidades',
            'view entidades',
            'create entidades',
            'edit entidades',
            'delete entidades',

            // ===== UNIDADES (Coordinador de Unidades) =====
            'manage unidades',
            'view unidades',
            'create unidades',
            'edit unidades',
            'delete unidades',

            // ===== ODS (Especialista en ODS) =====
            'manage ods',
            'view ods',
            'create ods',
            'edit ods',
            'delete ods',

            // ===== OBJETIVOS ESTRATÉGICOS (Planificador Estratégico) =====
            'manage objetivos_estrategicos',
            'view objetivos_estrategicos',
            'create objetivos_estrategicos',
            'edit objetivos_estrategicos',
            'delete objetivos_estrategicos',

            // ===== PND (Analista de PND) =====
            'manage pnd',
            'view pnd',
            'create pnd',
            'edit pnd',
            'delete pnd',

            // ===== PLANES (Gestor de Planes) =====
            'manage planes',
            'view planes',
            'create planes',
            'edit planes',
            'cambiar estado planes',
            'delete planes',

            // ===== PROGRAMAS (Coordinador de Programas) =====
            'manage programas',
            'view programas',
            'create programas',
            'edit programas',
            'delete programas',

            // ===== PROYECTOS (Analista de Proyectos) =====
            'manage proyectos',
            'view proyectos',
            'create proyectos',
            'edit proyectos',
            'delete proyectos',

            // ===== REPORTES Y SUPERVISIÓN =====
            'view reports',
            'generate reports',
            'export reports',
            'view all_modules', // Para supervisor general
        ];

        // Crear todos los permisos
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // ==================================================================================
        // ASIGNAR PERMISOS POR ROL - SEGÚN CASOS DE USO
        // ==================================================================================

        // 👑 ADMINISTRADOR DEL SISTEMA
        // ✅ CRUD COMPLETO: Usuarios
        // 👀 SOLO LECTURA: Todos los demás CRUDs (supervisión)
        $adminRole->givePermissionTo([
            'view dashboard',
            // Gestión completa de usuarios
            'manage usuarios',
            'view usuarios',
            'create usuarios',
            'edit usuarios',
            'delete usuarios',
            // Solo lectura de todos los demás módulos (supervisión)
            'view entidades',
            'view unidades',
            'view ods',
            'view objetivos_estrategicos',
            'view pnd',
            'view planes',
            'view programas',
            'view proyectos',
        ]);

        // 🏢 GESTOR DE ENTIDADES
        // ✅ CRUD COMPLETO: Entidades
        // 👀 SOLO LECTURA: Programas (para verificar relaciones)
        $gestorEntidadesRole->givePermissionTo([
            'view dashboard',
            'manage entidades',
            'view entidades',
            'create entidades',
            'edit entidades',
            'delete entidades',
            'view programas', // Para verificar relaciones
        ]);

        // 🏗️ COORDINADOR DE UNIDADES
        // ✅ CRUD COMPLETO: Unidades
        // 👀 SOLO LECTURA: Usuarios, Entidades (para contexto organizacional)
        $coordinadorUnidadesRole->givePermissionTo([
            'view dashboard',
            'manage unidades',
            'view unidades',
            'create unidades',
            'edit unidades',
            'delete unidades',
            'view usuarios', // Para contexto organizacional
            'view entidades', // Para contexto organizacional
        ]);

        // 🎯 ESPECIALISTA EN ODS
        // ✅ CRUD COMPLETO: ODS
        // 👀 SOLO LECTURA: Objetivos Estratégicos, Planes (para alineación)
        $especialistaOdsRole->givePermissionTo([
            'view dashboard',
            'manage ods',
            'view ods',
            'create ods',
            'edit ods',
            'delete ods',
            'view objetivos_estrategicos', // Para alineación
            'view planes', // Para alineación
        ]);

        // 🎯 PLANIFICADOR ESTRATÉGICO
        // ✅ CRUD COMPLETO: Objetivos Estratégicos
        // 👀 SOLO LECTURA: ODS, PND, Planes (para alineación estratégica)
        $planificadorEstrategicoRole->givePermissionTo([
            'view dashboard',
            'manage objetivos_estrategicos',
            'view objetivos_estrategicos',
            'create objetivos_estrategicos',
            'edit objetivos_estrategicos',
            'delete objetivos_estrategicos',
            'view ods', // Para alineación
            'view pnd', // Para alineación
            'view planes', // Para alineación
        ]);

        // 🇵🇪 ANALISTA DE PND
        // ✅ CRUD COMPLETO: PND
        // 👀 SOLO LECTURA: Objetivos Estratégicos, Planes (para coherencia nacional)
        $analistaPndRole->givePermissionTo([
            'view dashboard',
            'manage pnd',
            'view pnd',
            'create pnd',
            'edit pnd',
            'delete pnd',
            'view objetivos_estrategicos', // Para coherencia
            'view planes', // Para coherencia
        ]);

        // 📋 GESTOR DE PLANES
        // ✅ CRUD COMPLETO: Planes
        // 👀 SOLO LECTURA: Objetivos Estratégicos, ODS, PND, Programas (para alineación)
        $gestorPlanesRole->givePermissionTo([
            'view dashboard',
            'manage planes',
            'view planes',
            'create planes',
            'edit planes',
            'cambiar estado planes',
            'delete planes',
            'view objetivos_estrategicos', // Para alineación
            'view ods', // Para alineación
            'view pnd', // Para alineación
            'view programas', // Para alineación
        ]);

        // 🏛️ REVISOR INSTITUCIONAL
        // ✅ REVISIÓN Y APROBACIÓN DE PLANES
        // 👀 SOLO LECTURA: Todos los CRUDs relacionados (para supervisión)
        $revisorInstitucionalRole->givePermissionTo([
            'view planes',
            'cambiar estado planes',
        ]);

        // 📊 COORDINADOR DE PROGRAMAS
        // ✅ CRUD COMPLETO: Programas
        // 👀 SOLO LECTURA: Entidades, Planes (para vinculación correcta)
        $coordinadorProgramasRole->givePermissionTo([
            'view dashboard',
            'manage programas',
            'view programas',
            'create programas',
            'edit programas',
            'delete programas',
            'view entidades', // Para vinculación
            'view planes', // Para vinculación
        ]);

        // 📈 ANALISTA DE PROYECTOS
        // ✅ CRUD COMPLETO: Proyectos
        // 👀 SOLO LECTURA: Planes, Programas, Usuarios (para asignaciones)
        $analistaProyectosRole->givePermissionTo([
            'view dashboard',
            'manage proyectos',
            'view proyectos',
            'create proyectos',
            'edit proyectos',
            'delete proyectos',
            'view planes', // Para vinculación
            'view programas', // Para vinculación
            'view usuarios', // Para asignaciones
        ]);

        // 👁️ SUPERVISOR GENERAL
        // ❌ NINGÚN CRUD COMPLETO
        // 👀 SOLO LECTURA: TODOS los CRUDs + Reportes
        $supervisorGeneralRole->givePermissionTo([
            'view dashboard',
            'view all_modules',
            // Solo lectura de todos los módulos
            'view usuarios',
            'view entidades',
            'view unidades',
            'view ods',
            'view objetivos_estrategicos',
            'view pnd',
            'view planes',
            'view programas',
            'view proyectos',
            // Acceso completo a reportes
            'view reports',
            'generate reports',
            'export reports',
        ]);

        // ==================================================================================
        // BUSCAR USUARIO ADMINISTRADOR POR DEFECTO
        // ==================================================================================

        $adminUser = User::where('email', 'admin@example.com')->first();
        $adminUser->assignRole($adminRole);

        // ==================================================================================
        // USUARIOS DE EJEMPLO PARA CADA ROL
        // ==================================================================================

        $users = [
            [
                'name' => 'María González',
                'email' => 'maria.gonzalez@sipeip.gob.pe',
                'role' => $gestorEntidadesRole
            ],
            [
                'name' => 'Carlos Mendoza',
                'email' => 'carlos.mendoza@sipeip.gob.pe',
                'role' => $coordinadorUnidadesRole
            ],
            [
                'name' => 'Ana Rodríguez',
                'email' => 'ana.rodriguez@sipeip.gob.pe',
                'role' => $especialistaOdsRole
            ],
            [
                'name' => 'Luis Fernández',
                'email' => 'luis.fernandez@sipeip.gob.pe',
                'role' => $planificadorEstrategicoRole
            ],
            [
                'name' => 'Elena Torres',
                'email' => 'elena.torres@sipeip.gob.pe',
                'role' => $analistaPndRole
            ],
            [
                'name' => 'Roberto Silva',
                'email' => 'roberto.silva@sipeip.gob.pe',
                'role' => $gestorPlanesRole
            ],
            [
                'name' => 'Carmen López',
                'email' => 'carmen.lopez@sipeip.gob.pe',
                'role' => $coordinadorProgramasRole
            ],
            [
                'name' => 'Diego Herrera',
                'email' => 'diego.herrera@sipeip.gob.pe',
                'role' => $analistaProyectosRole
            ],
            [
                'name' => 'Patricia Vargas',
                'email' => 'patricia.vargas@sipeip.gob.pe',
                'role' => $supervisorGeneralRole
            ],
        ];

        foreach ($users as $userData) {
            $user = User::firstOrCreate([
                'email' => $userData['email']
            ], [
                'name' => $userData['name'],
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]);

            $user->assignRole($userData['role']);
        }

        $this->command->info('✅ Roles y permisos del Sistema SIPEIP 2.0 creados exitosamente');
        $this->command->info('📋 10 roles específicos con permisos granulares');
        $this->command->info('👥 10 usuarios de ejemplo creados (admin + 9 especialistas)');
        $this->command->info('🔑 Contraseña por defecto: password123 (admin: admin123)');
    }
}
