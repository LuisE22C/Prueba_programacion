<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ServicioController;

Route::resource('clientes', ClienteController::class);
Route::resource('tecnicos', TecnicoController::class);
Route::resource('marcas', MarcaController::class);
Route::resource('equipos', EquipoController::class);
Route::resource('servicios', ServicioController::class);


Route::get('servicios/estado/{estado}', [ServicioController::class, 'listarPorEstado'])->name('servicios.estado');
Route::get('servicios/tecnico/{id}', [ServicioController::class, 'listarPorTecnico'])->name('servicios.tecnico');

Route::get('/', function () {
    return view('home');
})->name('home');
