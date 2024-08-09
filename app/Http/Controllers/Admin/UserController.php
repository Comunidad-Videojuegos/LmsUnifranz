<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Users\USR_Info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Integration\INP_Career;
use App\Models\Integration\INP_Student;
use App\Models\Integration\INP_Instructor;
use Illuminate\Support\Facades\DB;
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

    public function careers()
    {
        return INP_Career::select('id', 'name')
            ->get();
    }
    public function careerInfo(Request $request)
    {
        return INP_Career::find($request->input('id'));
    }

    public function updateCareer(Request $request)
    {
        $career =  INP_Career::find($request->input('id'));
        $career->name = $request->input('name');
        $career->description = $request->input('description');
        $career->initials = $request->input('initials');
        $career->duration = $request->input('duration');

        $career->save();
        return response()->json("Se actualizo correctamente");
    }

    public function createCareer(Request $request)
    {
        INP_Career::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'initials' => $request->input('initials'),
            'duration' => $request->input('duration'),
        ]);
        return response()->json("Se creo correctamente");
    }
    public function createStudent(Request $request)
    {
        try {
            // Iniciar una transacción
            DB::beginTransaction();

            // Crear el usuario en la tabla User
            $user = User::create([
                'name' => $request->input('firstName'),
                'email' => $request->input('email'),
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
            INP_Student::create([
                'id' => $user->id,
                'careerId' => $request->input('careerId'),
                'semester' => 1,
                'referenceId' => 1
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


    public function createInstructor(Request $request)
    {
        try {
            // Iniciar una transacción
            DB::beginTransaction();

            // Crear el usuario en la tabla User
            $user = User::create([
                'name' => $request->input('firstName'),
                'email' => $request->input('email'),
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
            INP_Instructor::create([
                'id' => $user->id,
                'speciality' => $request->input('speciality'),
                'type' => $request->input('type')
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
