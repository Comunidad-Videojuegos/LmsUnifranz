
@extends('layouts.app')

@php
    $titles = ['Nombre', 'Iniciales', 'Editar', 'Eliminar'];
    $fields = $careers->map(function($career) {
        return [
            $career->id,
            $career->name,
            $career->initials,
        ];
    })->toArray();

    $buttons = [
        ['bi bi-pencil-square', '#278', '#fff', 'EditUserModal'],
        ['bi bi-trash3-fill', '#700', '#fff', 'DeleteUserModal'],
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
                <button class="bg-[#456] py-3 px-6 rounded-2xl" onclick="AddModal()">
                    Agregar
                </button>
            </div>
        </div>
        <div class="h-[80vh] relative overflow-auto py-7 px-5">
            <div class="rounded-2xl">
                <x-table :titles="$titles" :fields="$fields" :buttons="$buttons" :hasIcon=false
                    :pageNumber="$pageNumber" link="carreers" :totalPages="$totalPages" />
            </div>
        </div>
    </div>


    {{-- EDITAR --}}
    <x-modal width="500px" height="550px" title="Editar informacion de carrera" idModal="editModal" idCloseModal="closeEditModal">
        @include('carreers.update-career')
        <x-slot name="btn_action">
            <x-button-text id="btnEditUser" color="#fff" bg="#007bff" text="Editar" function="UpdateCareer"/>
        </x-slot>
    </x-modal>

    {{-- AGREGAR --}}
    <x-modal width="500px" height="550px" title="Crear nueva carrera" idModal="addModal" idCloseModal="closeAddModal">
        @include('carreers.create-career')
        <x-slot name="btn_action">
            <x-button-text id="btnEditUser" color="#fff" bg="#007bff" text="Editar" function="CreateCareer"/>
        </x-slot>
    </x-modal>

    {{-- ELIMINAR --}}
    <x-modal width="600px" height="140px" title="¿Esta seguro de eliminar esta carrera?" idModal="deleteModal" idCloseModal="closeDeleteModal">
        <x-slot name="btn_action">
            <x-button-text id="btnDeleteUser" color="#fff" bg="#007bff" text="Eliminar"/>
        </x-slot>
    </x-modal>



    <script>

        function EditUserModal(param)
        {
            let array = JSON.parse(param);
            localStorage.setItem("idCareerSystem", array[0])

            fetch(`/api/admin-general/career-info?id=${array[0]}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById("name_car").value = data.name;
                document.getElementById("desc_car").value = data.description;
                document.getElementById("ini_car").value = data.initials;
                document.getElementById("dur_car").value = data.duration;
            })


            const modal = new ModalPrefab("editModal", "closeEditModal");
            modal.openModal();
        }
        function DeleteUserModal(param)
        {
            const modal = new ModalPrefab("deleteModal", "closeDeleteModal");
            modal.openModal();
        }
        function AddModal()
        {
            const modal = new ModalPrefab("addModal", "closeAddModal");
            modal.openModal();
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
