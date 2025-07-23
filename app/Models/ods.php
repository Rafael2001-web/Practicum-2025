<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ods extends Model
{
    use HasFactory;

    protected $primaryKey='idOds';
    public $timestamps = false;
    protected $table = 'ods';

    protected $fillable =[
        'odsnum',
        'nombre',
        'descripcion'
    ];
}