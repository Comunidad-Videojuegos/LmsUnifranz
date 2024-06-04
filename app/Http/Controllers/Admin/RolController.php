<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\USR_Rol;
use App\Models\Users\USR_UserRoles;
use Illuminate\Support\Facades\DB;

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

    public function roles()
    {
        return USR_Rol::select('id', 'name')
            ->get();
    }

    public function rolesAdmin(Request $request)
    {
        $userId = $request->input("userId");
        return USR_UserRoles::where('userId', $userId)->get();
    }

    public function updateRol(Request $request)
    {
        $rolId = $request->input("idRol");
        $name = $request->input("name");
        $rol = USR_Rol::find($rolId);

        // Actualizar el nombre del rol
        $rol->name = $name;
        $rol->save();

        return response()->json(['message' => 'Rol actualizado correctamente'], 200);
    }

    public function updateRolesAdmin(Request $request)
    {
        $userId = $request->input('idUser');
        $roles = $request->input('roles');

        // Eliminar todos los roles actuales del usuario
        DB::table('USR_UserRoles')->where('userId', $userId)->delete();

        // Filtrar los roles que están en true y agregar esos roles al usuario
        foreach ($roles as $roleId => $isAssigned) {
            if ($isAssigned) {
                $roleId = str_replace('rol_', '', $roleId); // Obtener el ID del rol
                DB::table('USR_UserRoles')->insert([
                    'userId' => $userId,
                    'rolId' => $roleId
                ]);
            }
        }

        return response()->json(['message' => 'Roles actualizados correctamente'], 200);
    }
}
