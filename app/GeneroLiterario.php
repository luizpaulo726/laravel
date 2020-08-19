<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneroLiterario extends Model
{
    //
    public $table = 'generos_literarios';

    protected $fillable = [
        'descricao'
    ];
}
