<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'sector',
        'fecha_inicio',
        'fecha_fin',
        'presupuesto',
        'estado',
        'user_id'
    ];

    protected $dates = ['fecha_inicio', 'fecha_fin'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
