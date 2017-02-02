<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    //Mass Assigment
    protected  $fillable = ['title', 'body'];

}
