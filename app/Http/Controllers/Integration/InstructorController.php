<?php

namespace App\Http\Controllers\Integration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class InstructorController extends Controller
{
    public function index(Request $request)
    {
        $pageNumber = $request->input('pageNumber');

        if(!$pageNumber) $pageNumber = 1;

        $perPage = 10; // Número de usuarios por página
        $offset = ($pageNumber - 1) * $perPage;

        // Contar el total de usuarios que tienen instructores
        $totalUsers = User::whereHas('instructors')->count();
        $totalPages = ceil($totalUsers / $perPage);

        $users = User::with('userInfo')
            ->whereHas('instructors')
            ->skip($offset)
            ->take($perPage)
            ->get();

        return view('instructors.instructors')
            ->with('users', $users)
            ->with('totalPages', $totalPages)
            ->with('totalUsers', $totalUsers)
            ->with('pageNumber', $pageNumber);
    }
}
