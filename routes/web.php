<?php

use Illuminate\Support\Facades\Route;


// RUTAS PARA EL CONSUMO DE API DE GOOGLE
Route::prefix('google')->group(function()
    {
        include __DIR__. '/google/auth.google.php';
    }
);

// RUTAS DEL USUARIO CONFIG DEL LMS

Route::get('/admin', function () {
    return view('layouts.app');
})->middleware('auth.session');

Route::prefix('admin')->group(function()
    {
        Route::get('/', function () { return redirect('/admin/config'); });
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



// RUTAS PARA LA APLICACION DE REACT
Route::get('/{path?}', function() {
    return view('layouts.react-app');
})->where('path', '.*')->name('react');
