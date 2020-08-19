<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    //
    public $table = 'editoras';

    protected $fillable = [
        'descricao'
    ];
}
