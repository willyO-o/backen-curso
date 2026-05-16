<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nombre'])]

class Rol extends Model
{
    //
    protected $table = 'rol';
}
