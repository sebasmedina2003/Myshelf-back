<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/libros', [LibroController::class, "store"])->name("crud.create");
Route::get('/libros', [LibroController::class, "index"])->name("crud.get");
Route::put('/libros/{id}', [LibroController::class,'update'])->name('crud.update');
Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->name('curd.delete');
