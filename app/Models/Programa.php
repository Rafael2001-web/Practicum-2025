<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Programa extends Model
{
    use HasFactory;

    protected $primaryKey='idPrograma';
    protected $table = 'programa';

    protected $fillable =[
        'idEntidad',
        'nombre',
        'descripcion',
    ];

    /**
     * Relación 1:N - Un programa pertenece a una entidad
     */

     public function entidad():BelongsTo
     {
        return $this->belongsTo(Entidad::class,'idEntidad','idEntidad');
     }
}