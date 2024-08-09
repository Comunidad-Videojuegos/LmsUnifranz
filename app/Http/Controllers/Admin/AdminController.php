<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users\USR_Info;
use App\Models\Users\USR_UserRoles;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $pageNumber = $request->input('pageNumber');

        if(!$pageNumber) $pageNumber = 1;

        $perPage = 10; // Número de usuarios por página
        $offset = ($pageNumber - 1) * $perPage;

        $totalUsers = User::whereHas('userRoles')->count();
        $totalPages = ceil($totalUsers / $perPage);

        $users = User::with('userInfo')
            ->whereHas('userRoles')
            ->skip($offset)
            ->take($perPage)
            ->get();

        return view('admins.admins')
            ->with('users', $users)
            ->with('totalPages', $totalPages)
            ->with('totalUsers', $totalUsers)
            ->with('pageNumber', $pageNumber);
    }

    public function create(Request $request)
    {
        try {
            // Iniciar una transacción
            DB::beginTransaction();

            // Crear el usuario en la tabla User
            $user = User::create([
                'name' => $request->input('firstName'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('pass')),
            ]);

            // Crear la entrada en USR_Info
            USR_Info::create([
                'id' => $user->id,
                'photo' => '',
                'firstName' => $request->input('firstName'),
                'ci' => $request->input('ci'),
                'dadLastName' => $request->input('dadLastName'),
                'momLastName' => $request->input('momLastName'),
                'age' => $request->input('age'),
            ]);

            // Asignar el rol al usuario en USR_RolUser
            USR_UserRoles::create([
                'userId' => $user->id,
                'rolId' => $request->input('rol'),
            ]);


            // Confirmar la transacción
            DB::commit();

            // Respuesta exitosa
            return response()->json(["message" => "Agregado correctamente"], 200);
        } catch (\Exception $e) {
            // Si hay un error, revertir la transacción
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
