
<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;


Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/callback', function () {
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
