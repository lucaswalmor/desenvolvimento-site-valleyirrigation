<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class api extends Model
{
    // protected $fillable = [
    //     'nome', 'cidade', 'estado', 'pais', 'rua', 'cep', 'telefone', 'configuracao_idioma', 'tipo_usuario', 'email', 'password', 'situacao', 'email_verified_at'
    // ];

    protected $fillable = [
        'id', 'nome', 'telefone', 'email'
    ];
}
