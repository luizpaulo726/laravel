<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    //
    public $table = 'livros';

    protected $fillable = [
        'titulo',
        'ano',
        'autor_id',
        'editora_id',
        'gen_literario_id'
    ];
}
