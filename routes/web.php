<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use Illuminate\Http\Request;

// Ruta para mostrar el formulario
Route::get('/seguridad-test', function () {
    return view('formulario');
});

// Ruta para procesar el texto y mandarlo a la vista de resultados
Route::post('/guardar-seguro', function (Request $request) {
    $comentario = $request->input('contenido');
    return view('comentarios', compact('comentario'));
});