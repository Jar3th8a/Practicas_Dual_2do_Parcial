<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para mostrar el formulario
Route::get('/seguridad-test', function () {
    return view('formulario');
});

// Ruta para procesar el texto y mandarlo a la vista de resultados
Route::post('/guardar-seguro', function (Request $request) {
    $comentario = $request->input('contenido');
    return view('comentarios', compact('comentario'));
});

// Ruta del Dashboard (Protegida por login y con nombre asignado para Fortify)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('home');