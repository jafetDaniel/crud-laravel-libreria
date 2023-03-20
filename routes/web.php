<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('libros', \App\Http\Controllers\LibroController::class)->middleware('auth'); // auth: que se respete la autenticacion
Route::resource('categorias', \App\Http\Controllers\CategoriaController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
