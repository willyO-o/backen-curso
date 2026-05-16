<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['establecimiento_id','nombre_servicio','descripcion_servicio','precio','tipo','icono','disponible'])]
class Servicio extends Model
{
    //
    protected $table = 'servicio';
}
