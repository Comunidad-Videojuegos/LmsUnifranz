<?php

use Illuminate\Support\Facades\Route;

// REPORTES
Route::prefix('report')->group(function()
    {
        include __DIR__. '/report/demo.report.php';
    }
);

// RUTAS PARA EL CONSUMO DE API DE GOOGLE
Route::prefix('google')->group(function()
    {
        include __DIR__. '/google/auth.google.php';
    }
);



Route::get('/', function () {
    return view('auth.optionsLogin');
});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/welcome', function () {
    return view('welcome');
});
