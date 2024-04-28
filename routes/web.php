<?php

use Illuminate\Support\Facades\Route;


// RUTAS PARA EL CONSUMO DE API DE GOOGLE
Route::prefix('google')->group(function()
    {
        include __DIR__. '/google/auth.google.php';
    }
);

// RUTAS DEL USUARIO CONFIG DEL LMS
Route::prefix('admin')->group(function()
    {
        include __DIR__. '/admin/config.php';
        include __DIR__. '/admin/users.php';
        include __DIR__. '/admin/platform.php';
    }
);

// RUTAS DE INICIO

Route::get('/', function () {
    return view('auth.optionsLogin');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/admin', function () {
    return view('layouts.app');
});
