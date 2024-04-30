<?php

namespace App\Http\Controllers\Users;

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.users');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
