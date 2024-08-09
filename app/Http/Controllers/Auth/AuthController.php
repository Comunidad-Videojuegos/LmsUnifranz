<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('user_name', 'user_pass');

        if (
            Auth::attempt(['email' => $credentials['user_name'], 'password' => $credentials['user_pass']]) ||
            Auth::attempt(['name' => $credentials['user_name'], 'password' => $credentials['user_pass']])) {

            $user = Auth::user();

            // Agregar datos a las cookies
            $new_cookie = Cookie::make('user_id', $user->id, null);

            // Authentication passed...
            return redirect()->intended('/admin/admins')->withCookie($new_cookie);
        }

        return back()->withErrors([
            'user_name' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
