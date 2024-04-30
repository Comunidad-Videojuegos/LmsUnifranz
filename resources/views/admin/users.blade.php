
@extends('layouts.app')
@section('app-page')
    <div class="flex h-screen flex-col">
        <div class="h-1/5 px-10">
            <div class="pl-5 pt-7">
                <h1 class="font-semibold">USUARIOS</h1>
            </div>
            <div class="flex justify-end">
                <div class="px-10 py-4">
                    <button  onclick="document.getElementById('createUserMod').showModal()">
                        <x-bi-person-plus-fill width="30px" height="30px"/>
                    </button>
                </div>
                <div class="px-10 py-4">
                    <button>
                        <x-bi-file-pdf-fill width="30px" height="30px"/>
                    </button>
                </div>
            </div>
        </div>
        <div class="h-4/5 px-10">
            <div class="relative h-full overflow-auto rounded-xl border">
                <table class="m-auto w-full text-center text">
                    <thead class="bg-black text-white">
                        <tr>
                            <th class="py-5">Nombre</th>
                            <th>Apellidos</th>
                            <th>Ci</th>
                            <th>Email</th>
                            <th class="w-1/12">Editar</th>
                            <th class="w-1/12">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border">

                                @if ($user->userInfo)
                                    <td class="py-4">{{$user->userInfo->names}}</td>
                                    <td>{{ $user->userInfo->firstName }} {{ $user->userInfo->lastName }}</td>
                                    <td>{{ $user->userInfo->ci }}</td>
                                    <td>{{ $user->email }}</td>
                                @else
                                    <td class="py-4">{{$user->name}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                @endif

                                <td class="text-red-500">
                                    <button onclick="document.getElementById('deleteUserMod').showModal()">
                                        <x-bi-trash3-fill />
                                    </button>
                                </td>
                                <td class="text-blue-400">
                                    <button onclick="document.getElementById('updateUserMod').showModal()">
                                        <x-bi-pencil-fill />
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <dialog id="createUserMod" class="p-5 bg-slate-700 rounded-md shadow-xl w-1/2 h-3/4 text-white">
        <h1 class="text-xl font-bold mb-4 text-center">Crear nuevo usuario</h1>
        <form action="{{route('users.store')}}" method="POST">
            <div class="flex justify-around">
                <x-field-item-input id="username" name="username" placeholder="Nombre de usuario"
                title="Ingrese su nombre:" type="text"/>
                <x-field-item-input id="userpass" name="userpass" placeholder="Contraseña de usuario"
                title="Ingrese su contraseña:" type="password"/>
            </div><br>

            <div class="flex justify-around">
                <x-field-item-input id="email" name="email" placeholder="Correo de usuario"
                title="Ingrese su correo:" type="email"/>
                <x-field-item-input id="ci" name="ci" placeholder="Carnet de identidad"
                title="Ingrese su ci:" type="text"/>
            </div><br>

            <div class="flex justify-around">
                <x-field-item-input id="namefull" name="namefull" placeholder="Nombre completo"
                title="Ingrese los nombres:" type="text"/>
                <x-field-item-input id="age" name="age" placeholder="Edad"
                title="Ingrese la edad:" type="number"/>
            </div><br>

            <div class="flex justify-around">
                <x-field-item-input id="momlastname" name="momlastname" placeholder="Apellido materno"
                title="Apellido materno:" type="text"/>
                <x-field-item-input id="dadlastname" name="dadlastname" placeholder="Apellido paterno"
                title="Apellido paterno:" type="text"/>
            </div>

            <menu class="mt-4 flex justify-end space-x-2">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    onclick="">
                    Crear
                </button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                    onclick="event.preventDefault();document.getElementById('createUserMod').close()">
                    Cerrar
                </button>
            </menu>
        </form>
    </dialog>


    <dialog id="updateUserMod" class="p-5 bg-slate-700 rounded-md shadow-xl w-1/2 h-1/2 text-white">
        <h1 class="text-xl font-bold mb-4 text-center">Actualizar usuario</h1>
        <form action="" method="PUT">

            <div class="flex justify-around">
                <x-field-item-input id="ci" name="ci" placeholder="Carnet de identidad"
                title="Ingrese su ci:" type="text"/>
            </div><br>

            <div class="flex justify-around">
                <x-field-item-input id="namefull" name="namefull" placeholder="Nombre completo"
                title="Ingrese los nombres:" type="text"/>
                <x-field-item-input id="age" name="age" placeholder="Edad"
                title="Ingrese la edad:" type="number"/>
            </div><br>

            <div class="flex justify-around">
                <x-field-item-input id="momlastname" name="momlastname" placeholder="Apellido materno"
                title="Apellido materno:" type="text"/>
                <x-field-item-input id="dadlastname" name="dadlastname" placeholder="Apellido paterno"
                title="Apellido paterno:" type="text"/>
            </div>

            <menu class="mt-4 flex justify-end space-x-2">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    onclick="">
                    Actualizar
                </button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                    onclick="document.getElementById('updateUserMod').close()">
                    Cerrar
                </button>
            </menu>
        </form>
    </dialog>


    <dialog id="deleteUserMod" class="p-5 bg-slate-700 rounded-md shadow-xl w-1/3 h-32 text-white">
        <h1 class="text-xl font-bold mb-4 text-center">¿Estas seguro de eliminar a este usuario?</h1>
        <menu class="mt-5 flex justify-end space-x-2">
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="document.getElementById('createUserMod').close()">
                Eliminar
            </button>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="document.getElementById('deleteUserMod').close()">
                Cerrar
            </button>
        </menu>
    </dialog>

    <script>
        function updateRegister(idUser)
        {

            document.getElementById('updateUserMod').close();
        }
    </script>
@endsection
