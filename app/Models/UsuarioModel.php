<?php
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

    protected $fillable = [
        'email', 'nome_usuario', 'senha', 'nivel_acesso', 'escolaridade', 'data_nasc'
    ];

    protected $hidden = ['senha'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['senha'] = bcrypt($value);
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
