<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();
    $user = User::updateOrCreate([
        'google_id' => $user_google->id,
    ],
    [
        'name' => $user_google->name,
        'email' => $user_google->email,
    ]);
    Auth::login($user);

    return redirect('/welcome');
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.optionsLogin');
});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/welcome', function () {
    return view('welcome');
});
