
<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Auth\AuthController;


Route::post('/auth/login', [AuthController::class, "login"])->name('login_send');
Route::post('/auth/logout', [AuthController::class, "logout"])->name('logout');
