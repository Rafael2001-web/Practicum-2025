<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objEstrategico extends Model
{
    use HasFactory;

    protected $primaryKey='idobjEstrategico';
    public $timestamps = false;
    protected $table = 'objEstrategicos';

    protected $fillable =[
        //'idobjEstrategico',
        'fechaRegistro',
        'descripcion',
        'estado'
    ];

    /**
     * Relación 1:N - Un Objetivo Estratégico Institucional puede alinearse con varios ODS.
     

     public function ods():HasMany
     {
        return $this->hasMany(ods::class,'idOds','idOds');
     }
    */
}