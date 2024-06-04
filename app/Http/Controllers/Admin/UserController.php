<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Users\USR_Info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('userInfo')->get();

        return view('admin.users')
            ->with('users', $users);
    }

    public function userInfo(Request $request)
    {
        $user = User::with('userInfo')->where('id', $request->input('idUser'))->first();

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        return response()->json([
            'id' => $user->id,
            'email' => $user->email,
            'firstName' => $user->userInfo->firstName,
            'dadLastName' => $user->userInfo->dadLastName,
            'momLastName' => $user->userInfo->momLastName,
            'ci' => $user->userInfo->ci,
            'age' => $user->userInfo->age,
        ]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->username;
        dd($request->username);
        $user->password = Hash::make($request->userpass);
        $user->email = $request->email;
        $user->save();

        $userInfo = new USR_Info();
        $userInfo->id = $user->id;
        $userInfo->names = $userInfo->namefull;
        $userInfo->ci = $userInfo->ci;
        $userInfo->firstName = $userInfo->momlastname;
        $userInfo->lastName = $userInfo->dadlastname;
        $userInfo->age = $userInfo->age;
        $usrInfo->save();

        $users = User::with('userInfo')->get();

        return view('admin.users')
            ->with('users', $users);
    }

    public function show(string $id)
    {
        return view('admin.users');
    }

    public function update(Request $request)
    {

        // Obtener el ID de usuario del cuerpo de la solicitud
        $userId = $request->input('idUser');

        // Buscar al usuario por su ID
        $user = User::find($userId);

        // Verificar si el usuario existe
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Actualizar el email del usuario si se proporciona en la solicitud
        if ($request->has('email')) {
            $user->email = $request->input('email');
            $user->save();
        }

        // Actualizar los detalles del usuario en la tabla UserInfo
        $userInfo = $user->userInfo;

        if ($userInfo) {
            // Actualizar los detalles de UserInfo si se proporcionan en la solicitud
            if ($request->has('firstName')) {
                $userInfo->firstName = $request->input('firstName');
            }
            if ($request->has('dadLastName')) {
                $userInfo->dadLastName = $request->input('dadLastName');
            }
            if ($request->has('momLastName')) {
                $userInfo->momLastName = $request->input('momLastName');
            }
            if ($request->has('ci')) {
                $userInfo->ci = $request->input('ci');
            }
            if ($request->has('age')) {
                $userInfo->age = $request->input('age');
            }

            // Guardar los cambios en UserInfo
            $userInfo->save();
        }
        return response()->json("Se actualizo correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
