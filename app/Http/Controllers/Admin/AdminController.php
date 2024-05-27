<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $pageNumber = $request->input('pageNumber');

        if(!$pageNumber) $pageNumber = 1;

        $perPage = 10; // Número de usuarios por página
        $offset = ($pageNumber - 1) * $perPage;

        $totalUsers = User::count();
        $totalPages = ceil($totalUsers / $perPage);

        $users = User::with('userInfo')
            ->skip($offset)
            ->take($perPage)
            ->get();

        return view('admins.admins')
            ->with('users', $users)
            ->with('totalPages', $totalPages)
            ->with('totalUsers', $totalUsers)
            ->with('pageNumber', $pageNumber);
    }
}
