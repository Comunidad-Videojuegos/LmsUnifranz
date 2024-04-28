
@extends('layouts.app')

@section('app-page')
    <div class="p-10">

        {{-- informacion personal del usuario Admin --}}
        <div class="font-extrabold">
            <hr><h1 class="my-5 pl-5">INFORMACIÓN PERSONAL</h1><hr>
        </div>

        <div class="py-12 px-7">

            <div class="flex justify-around">
                <div>
                    <x-field-item-input id="username" name="username" placeholder="Nombre de usuario"
                    title="Ingrese su nombre usuario:" type="text"/>
                </div>

                <div>
                    <x-field-item-input id="pass" name="pass" placeholder="Contraseña"
                    title="Ingrese su contraseña:" type="password"/>
                </div>

                <div>
                    <x-field-item-input id="email" name="email" placeholder="Correo electronico"
                    title="Ingrese su correo:" type="email"/>
                </div>
            </div>

            <br><br>

            <div class="flex justify-around">
                <div>
                    <x-field-item-input id="name" name="name" placeholder="Nombre completo"
                    title="Ingrese su nombre completo:" type="text"/>
                </div>

                <div>
                    <x-field-item-input id="lastname_dad" name="lastname_dad" placeholder="Apellido paterno"
                    title="Ingrese su apellido paterno:" type="text"/>
                </div>

                <div>
                    <x-field-item-input id="lastname_mom" name="lastname_mom" placeholder="Apellido paterno"
                    title="Ingrese su apellido materno:" type="text"/>
                </div>
            </div>

            <br><br>

            <div class="flex justify-around">
                <div>
                    <x-field-item-input id="ci" name="ci" placeholder="Carnet de identidad"
                    title="Ingrese su carnet de identidad:" type="text"/>
                </div>
            </div>


            <div class="text-right mt-10 mr-10">
                <button class=" bg-slate-800 px-5 py-4 rounded-lg hover:font-bold hover:scale-110 duration-75 ease-linear">
                    ACTUALIZAR
                </button>
            </div>
        </div>

        {{-- informacion del sistema --}}
        <div class="font-extrabold">
            <hr><h1 class="my-5 pl-5">INFORMACIÓN DEL SISTEMA</h1><hr>
        </div>

        <div class="py-12 px-7">
            <h1>Ingresar nombre</h1>
        </div>

        {{-- configuracion de conexion a los datos externos --}}

        <div class="font-extrabold">
            <hr><h1 class="my-5 pl-5">CONEXIÓN A EXTERNOS</h1><hr>
        </div>

        <div class="py-12 px-7">
            <h1>Ingresar nombre</h1>
        </div>
    </div>
@endsection
