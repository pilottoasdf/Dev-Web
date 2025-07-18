<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressoJogo extends Model
{
    protected $fillable = [
        'id_jogo',
        'id_usuario',
        'pontos',
        'trofeu',
    ];
}
