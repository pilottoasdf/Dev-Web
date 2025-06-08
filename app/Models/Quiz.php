<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'disciplina',
        'escolaridade_recomendada',
        'imagem',
        'perguntas',
        'id_criador'
    ];
}
