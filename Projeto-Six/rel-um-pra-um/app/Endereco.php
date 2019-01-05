<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    function cliente(){
        return $this->belongTo('App\Cliente');
    }
}
