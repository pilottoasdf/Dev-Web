<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressoQuiz extends Model
{
    protected $fillable = [
        'id_quiz',
        'id_usuario',
        'tentativas',
        'pontos',
        'trofeu',
    ];
}
