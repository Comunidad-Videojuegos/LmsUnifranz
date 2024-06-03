<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\USR_Rol;

class RolController extends Controller
{
    public function index(Request $request)
    {
        $pageNumber = $request->input('pageNumber', 1);
        $perPage = 10;
        $offset = ($pageNumber - 1) * $perPage;

        $totalCareers = USR_Rol::count();
        $totalPages = ceil($totalCareers / $perPage);

        $roles = USR_Rol::select('id', 'name')
            ->skip($offset)
            ->take($perPage)
            ->get();

        return view('admin.roles')
            ->with('roles', $roles)
            ->with('totalPages', $totalPages)
            ->with('pageNumber', $pageNumber);


    }
}
