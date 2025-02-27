<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return "Hello World from about page";
});

Route::view('profile', 'profile');

// Se crea una ruta para subir archivos desde un formulario
Route::post('profile', [App\Http\Controllers\ProfileController::class, 'uploadPhoto']);