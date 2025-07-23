<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use App\Models\User;


class ProyectoSeeder extends Seeder
{
    public function run()
    {
        // Crear 3 usuarios de prueba
        $users = User::factory(3)->create();

        // Crear 20 proyectos asignados aleatoriamente a los usuarios
        Proyecto::factory(20)->create([
            'user_id' => function() use ($users) {
                return $users->random()->id;
            }
        ]);

        // Mensaje de confirmación
        $this->command->info('¡20 proyectos de prueba creados exitosamente!');
    }
}