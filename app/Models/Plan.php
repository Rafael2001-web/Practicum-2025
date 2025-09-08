<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class plan extends Model
{
    use HasFactory;

    protected $primaryKey='idPlan';
    public $timestamps = false;
    protected $table = 'plan';

    protected $fillable =[
        'codigo',
        'nombre',
        'entidad',
        'presupuesto',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];
    
    protected static function booted()
    {
        static::creating(function ($plan) {
            if (empty($plan->codigo)) {
                // Genera un código único. Ejemplo: PLN-<5 caracteres aleatorios>
                do {
                    $codigo = 'PLN-' . strtoupper(Str::random(5));
                } while (self::where('codigo', $codigo)->exists());

                $plan->codigo = $codigo;
            }
        });
    }

}
