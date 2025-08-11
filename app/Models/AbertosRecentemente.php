<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbertosRecentemente extends Model
{
    protected $table = 'abertos_recentemente';
    protected $fillable = ['id_usuario', 'id_quiz', 'id_jogo'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'id_quiz');
    }

    public function jogo()
    {
        return $this->belongsTo(Jogo::class, 'id_jogo');
    }
}
