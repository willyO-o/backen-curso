<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nombre', 'descripcion', 'direccion', 'imagen', 'telefono', 'email', 'website', 'horario_apertura', 'horario_cierre', 'latitud', 'longitud', 'estado', 'categoria_id', 'user_id'])]
class Establecimiento extends Model
{
    //
    protected $table = 'establecimiento';


    protected  $appends = [
        'url_imagen'
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($establecimiento){
            $establecimiento->user_id = 1;
        });
    }


    public function getUrlImagenAttribute()
    {
        return asset('storage/'.$this->imagen);
    }


    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'establecimiento_id');
    }

}
