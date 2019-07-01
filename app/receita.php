<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class receita extends Model
{
    protected $fillable = [
        'titulo', 'ingredientes', 'preparo',
    ];
}
