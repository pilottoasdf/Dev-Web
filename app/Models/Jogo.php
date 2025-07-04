<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'disciplina',
        'escolaridade_recomendada',
        'imagem',
        'codigo',
        'id_criador'
    ];
}
