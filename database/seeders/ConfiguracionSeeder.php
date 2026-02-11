<?php

namespace Database\Seeders;

use App\Models\ConfiguracionSistema;
use Illuminate\Database\Seeder;

class ConfiguracionSeeder extends Seeder
{
    public function run(): void
    {
        ConfiguracionSistema::firstOrCreate(
            ['clave' => 'regla_cumplimiento_objetivos'],
            [
                'valor' => 'AND',
                'descripcion' => 'Regla de cumplimiento de objetivos: AND u OR.'
            ]
        );
    }
}
