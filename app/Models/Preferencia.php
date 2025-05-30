<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preferencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'peso_portugues',
        'peso_matematica',
        'peso_fisica',
        'peso_quimica',
        'peso_biologia',
        'peso_historia',
        'peso_geografia',
        'peso_filosofia',
        'peso_sociologia',
        'peso_ingles'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
