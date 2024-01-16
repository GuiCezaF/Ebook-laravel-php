<?php




Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return ('<h1>Hello World</h1>');
});

