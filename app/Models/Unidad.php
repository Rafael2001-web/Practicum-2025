<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unidad extends Model
{
    use HasFactory;

    protected $primaryKey='idUnidad';
    public $timestamps = false;
    protected $table = 'unidad';

    protected $fillable =[
        'macroSector',
        'sector',
        'estado'
    ];
}

