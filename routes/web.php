<?php

use Illuminate\Support\Facades\Route;


// RUTAS PARA EL CONSUMO DE API DE GOOGLE
Route::prefix('google')->group(function()
    {
        include __DIR__. '/google/auth.google.php';
        include __DIR__. '/google/auth.session.php';
    }
);

// RUTAS POR DEFECTO
Route::prefix('admin')->middleware('auth')->group(function()
    {
        Route::get('/', function () { return redirect('/admin/config'); });
        include __DIR__. '/admin/config.php';
        include __DIR__. '/admin/permissions.php';
        include __DIR__. '/admin/roles.php';
        include __DIR__. '/admin/admins.php';

        include __DIR__. '/content/carreers.php';
        include __DIR__. '/content/courses.php';

        include __DIR__. '/content/activities.php';
        include __DIR__. '/content/evidences.php';

        include __DIR__. '/integration/instructors.php';
        include __DIR__. '/integration/students.php';

        include __DIR__. '/platform/advertesements.php';
        include __DIR__. '/platform/advertising.php';
    }
);

// RUTAS DE INICIO

Route::get('/', function () {
    return view('auth.optionsLogin');
})->name('init-app');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');



// RUTAS PARA LA APLICACION DE REACT
Route::get('/{path?}', function() {
    return view('layouts.react-app');
})->middleware('auth')->where('path', '.*')->name('react');
