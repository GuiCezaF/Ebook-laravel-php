<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return ('<h1>Hello World</h1>');
});

Route::get('/produtos', [ProdutoController::class, 'Lista']);

