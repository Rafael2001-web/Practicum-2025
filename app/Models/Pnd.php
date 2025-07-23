<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pnd extends Model
{
    use HasFactory;

    protected $primaryKey='idPnd';
    public $timestamps = false;
    protected $table = 'pnd';

    protected $fillable =[
        'eje',
        'objetivoN',
        'descripcion'
    ];
}

