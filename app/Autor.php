<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    //
        //
        public $table = 'autores';

        protected $fillable = [
            'nome','nacionalidade','sexo','nascimento'
        ];
}
