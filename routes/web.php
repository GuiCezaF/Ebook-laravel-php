<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/produtos', [ProdutoController::class, 'Lista']);

Route::get('/produtos/mostra/{id}',  [ProdutoController::class, 'Mostra'])->where('id', '[0-9]+');

Route::get('/produtos/novo', [ProdutoController::class,'Novo']);

Route::post('/produtos/adiciona', [ProdutoController::class,'Adiciona']);


