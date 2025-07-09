<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entidad extends Model
{
    use HasFactory;

    protected $primaryKey='idEntidad';
    public $timestamps = false;
    protected $table = 'entidad';

    protected $fillable =[
        'codigo',
        'subSector',
        'nivelGobierno',
        'estado',
        'fechaCreacion',
        'fechaActualizacion'
    ];

    /**
     * Relación 1:N - Una entidad tiene muchos programas
     */

     public function programas():HasMany
     {
        return $this->hasMany(Programa::class,'idEntidad','idEntidad');
     }
}