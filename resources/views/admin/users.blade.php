
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
                    <button class=" flex justify-around w-36" onclick="document.getElementById('reportStudent').showModal()">
                        <p>Estudiantes</p><x-bi-file-pdf-fill width="30px" height="30px"/>
                    </button>
                </div>
                <div class="px-10 py-4">
                    <button class=" flex justify-around w-36" onclick="document.getElementById('reportStudent2').showModal()">
                        <p>Grafica</p><x-bi-file-pdf-fill width="30px" height="30px"/>
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


    <dialog id="reportStudent" class="p-5 bg-slate-700 rounded-md shadow-xl w-1/3 h-[60vh] text-white">
        <h1 class="text-xl font-bold mb-4 text-center">Reporte de estudiantes por carrera</h1>
        <div class="flex justify-around flex-col items-center">
            <div>
                <h2 class="py-4 font-bold">Fecha de inicio</h2>
                <input type="date" id="initDate1" class="text-black py-2 pl-4 rounded-lg w-64">
            </div>
            <div>
                <h2 class="py-4 font-bold">Fecha final</h2>
                <input type="date" id="endDate1" class="text-black py-2 pl-4 rounded-lg w-64">
            </div>
            <div>
                <h2 class="py-4 font-bold">Tipo</h2>
                <select name="" id="type1" class="text-black py-2 pl-4 rounded-lg w-64">
                    <option value="pdf">PDF</option>
                    <option value="xlsx">XLSX</option>
                    <option value="docx">WORD</option>
                </select>
            </div>
        </div>
        <menu class="mt-5 flex justify-end space-x-2">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="report1">
                Generar
            </button>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="document.getElementById('reportStudent').close()">
                Cerrar
            </button>
        </menu>
    </dialog>


    <dialog id="reportStudent2" class="p-5 bg-slate-700 rounded-md shadow-xl w-1/3 h-[60vh] text-white">
        <h1 class="text-xl font-bold mb-4 text-center">Reporte de estudiantes grafica</h1>
        <div class="flex justify-around flex-col items-center">
            <div>
                <h2 class="py-4 font-bold">Fecha de inicio</h2>
                <input type="date" id="initDate2" class="text-black py-2 pl-4 rounded-lg w-64">
            </div>
            <div>
                <h2 class="py-4 font-bold">Fecha final</h2>
                <input type="date" id="endDate2" class="text-black py-2 pl-4 rounded-lg w-64">
            </div>
            <div>
                <h2 class="py-4 font-bold">Tipo</h2>
                <select name="" id="type2" class="text-black py-2 pl-4 rounded-lg w-64">
                    <option value="pdf">PDF</option>
                    <option value="xlsx">XLSX</option>
                    <option value="docx">WORD</option>
                </select>
            </div>
        </div>
        <menu class="mt-5 flex justify-end space-x-2">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="report2">
                Generar
            </button>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="document.getElementById('reportStudent2').close()">
                Cerrar
            </button>
        </menu>
    </dialog>

    <script>
        document.getElementById("report1").addEventListener("click", () =>
        {
            const finit = document.getElementById("initDate1").value;
            const fend = document.getElementById("endDate1").value;
            const type = document.getElementById("type1").value;


            fetch(`/api/report/general/students/for-career?type=${type}&initDate=${finit}&endDate=${fend}`)
            .then(response => response.json())
            .then(response => {
            if (response) {
                window.open(response, "_blank")
            } else {
                alert('Error al eliminar la venta');
            }
            }).catch(error => console.error('Error:', error));


        }, false)


        document.getElementById("report2").addEventListener("click", () =>
        {
            const finit = document.getElementById("initDate2").value;
            const fend = document.getElementById("endDate2").value;
            const type = document.getElementById("type2").value;


            fetch(`/api/report/general/students/for-career/grafic?type=${type}&initDate=${finit}&endDate=${fend}`)
            .then(response => response.json())
            .then(response => {
            if (response) {
                window.open(response, "_blank")
            } else {
                alert('Error al eliminar la venta');
            }
            }).catch(error => console.error('Error:', error));


        }, false)
    </script>

@endsection
