
@extends('layouts.app')

@php
    $titles = ['Nombre', 'Editar'];
    $fields = $roles->map(function($rol) {
        return [
            $rol->id,
            $rol->name
        ];
    })->toArray();

    $buttons = [
        ['bi bi-pencil-square', '#278', '#fff', 'EditRolModal'],
    ];
@endphp

@section('app-page')
    <div class="h-full">
        <div class="h-[20vh] flex justify-between items-center">
            <div class="flex-1 px-8">
                <input type="text" class="py-3 pl-4 w-full rounded-lg text-black outline-none"
                    placeholder="Buscar por nombre" id="filter">
            </div>

            <div class="flex-1 px-8 flex justify-end">
                {{-- <button class="bg-[#456] py-3 px-6 rounded-2xl">
                    Agregar
                </button> --}}
            </div>
        </div>
        <div class="h-[80vh] relative overflow-auto py-7 px-5">
            <div class="rounded-2xl">
                <x-table :titles="$titles" :fields="$fields" :buttons="$buttons" :hasIcon=false
                    :pageNumber="$pageNumber" link="instructors" :totalPages="$totalPages" />
            </div>
        </div>
    </div>


    {{-- EDITAR --}}
    <x-modal width="400px" height="300px" title="Editar nombre del rol" idModal="editModal" idCloseModal="closeEditModal">

        <div class="flex justify-center items-center flex-col">
            <h3 class="py-4">Nombre de rol:</h3>
            <x-input-text placeholder="Nombre de rol" id="name_rol_up" width="280px" />
        </div>
        <x-slot name="btn_action">
            <x-button-text id="btnEditUser" color="#fff" bg="#007bff" text="Editar" function="EditRol"/>
        </x-slot>
    </x-modal>


    <script>
        function EditRolModal(param)
        {
            let array = JSON.parse(param);
            localStorage.setItem("idRolSystem", array[0])

            document.getElementById("name_rol_up").value = array[1];

            const modal = new ModalPrefab("editModal", "closeEditModal");
            modal.openModal();
        }

        async function EditRol() {
            const idRol = localStorage.getItem("idRolSystem");
            const name = document.getElementById("name_rol_up").value;

            const axiosInstance = new AxiosInstance();

            axiosInstance.setMessageError("No se pudo editar el rol");
            axiosInstance.setMessageSuccess("Se edito el rol correctamente");

            await axiosInstance.put(`/admin-general/rol`, { idRol, name});
            location.reload();
        }
    </script>




    {{-- FILTER --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('filter');
            const rows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('keyup', function () {
                const searchTerm = this.value.trim().toLowerCase();

                rows.forEach(row => {
                    const name = row.querySelector('td:nth-child(1)').textContent.trim().toLowerCase();
                    if (name.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>

@endsection
