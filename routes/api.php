<?php

use Illuminate\Support\Facades\Route;

Route::get('/saludo-api', function () {
    return response()->json(['message' => '¡Hola desde la API!']);
});

Route::resource('categorias', \App\Http\Controllers\CategoriaController::class)->except(['create', 'edit']);
Route::resource('establecimientos', \App\Http\Controllers\EstablecimientoController::class)->except(['create','edit']);


Route::resource('servicios', \App\Http\Controllers\ServicioController::class)->except(['create','edit', 'index']);
