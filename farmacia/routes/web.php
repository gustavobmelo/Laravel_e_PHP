<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

// ROTA PRINCIPAL
Route::get('/', function () {
    return redirect('/produtos'); // página inicial
});

Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);
