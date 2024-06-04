
@extends('layouts.app')

@php
    $titles = ['Perfil', 'Nombre', 'Email', 'Editar', 'Eliminar'];
    $fields = $users->map(function($user) {
        return [
            $user->id,
            $user->userInfo->photo,
            ($user->userInfo->firstName . '  ' . $user->userInfo->dadLastName . '  ' . $user->userInfo->momLastName),
            $user->email,
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
                <div class="px-5">
                    <x-button-text text="Agregar" bg="#456" color="#fff" id="btn_add" function="AddModal"/>
                </div>
                {{-- <div class="px-5">
                    <x-button-text text="Importar" bg="#2d572c" color="#fff" id="btn_xlsx" function="XlsxModal"/>
                </div> --}}
                <div class="px-5">
                    <x-button-icon icon="bi bi-file-pdf-fill" bg="#456" color="#fff" function="ReportModal" width="100px" height="40px"/>
                </div>
            </div>
        </div>
        <div class="h-[80vh] relative overflow-auto py-7 px-5">
            <div class="rounded-2xl">
                <x-table :titles="$titles" :fields="$fields" :buttons="$buttons" :hasIcon=true
                    :pageNumber="$pageNumber" link="students" :totalPages="$totalPages" />
            </div>
        </div>
    </div>


    {{-- EDITAR --}}
    <x-modal width="700px" height="450px" title="Editar informacion del usuario" idModal="editModal" idCloseModal="closeEditModal">
        @include('admins.update-user')
        <x-slot name="btn_action">
            <x-button-text id="btnEditUser" color="#fff" bg="#007bff" text="Editar" function="UpdateUser"/>
        </x-slot>
    </x-modal>


    {{-- AGREGAR --}}
    <x-modal width="700px" height="550px" title="Agregar nuevo estudiante" idModal="addModal" idCloseModal="closeAddModal">
        @include('students.create-student')
        <x-slot name="btn_action">
            <x-button-text id="btnAddStudent" color="#fff" bg="#007bff" text="Agregar" function="CreateStudent"/>
        </x-slot>
    </x-modal>

    {{-- AGREGAR --}}
    {{-- <x-modal width="400px" height="250px" title="Agregar estudantes por lote" idModal="xlsxModal" idCloseModal="closeXlsxModal">

        <div class="w-full flex justify-around items-center">
            <p>Selecciona un excel</p>
            <input type="file" accept=".xlsx, .xls">
        </div>
        <x-slot name="btn_action">
            <x-button-text id="btnAdd" color="#fff" bg="#007bff" text="Agregar por lote"/>
        </x-slot>
    </x-modal> --}}

    {{-- OBTENER REPORTE --}}
    <x-modal width="450px" height="330px" title="Reporte de estudiantes" idModal="reportModal" idCloseModal="closeReportModal">
        @include('admins.report-admin')
        <x-slot name="btn_action">
            <div class="mr-5">
                <x-button-text id="btnReportGeneral" color="#fff" bg="#007bff" text="Preview" function="GenerateReportPreview" width="130px">
                    <i class="bi bi-file-pdf-fill"></i>
                </x-button-text>
            </div>
            <div>
                <x-button-text id="btnReportGrafic" color="#fff" bg="#007bff" text="Grafic" function="GenerateReportPreview2" width="130px">
                    <i class="bi bi-file-pdf-fill"></i>
                </x-button-text>
            </div>
        </x-slot>
    </x-modal>

    {{-- ELIMINAR --}}
    <x-modal width="600px" height="140px" title="¿Esta seguro de eliminar el estudiante?" idModal="deleteModal" idCloseModal="closeDeleteModal">
        <x-slot name="btn_action">
            <x-button-text id="btnDeleteUser" color="#fff" bg="#007bff" text="Eliminar"/>
        </x-slot>
    </x-modal>



    <script>

        function EditUserModal(param)
        {
            let array = JSON.parse(param);
            localStorage.setItem("idUserSystem", array[0])
            fetch(`/api/admin-general/user-info?idUser=${array[0]}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById("email_user").value = data.email;
                document.getElementById("names_user").value = data.firstName;
                document.getElementById("ci_user").value = data.ci;

                document.getElementById("ap_fa_user").value = data.dadLastName;
                document.getElementById("ap_ma_user").value = data.momLastName;
                document.getElementById("age_user").value = data.age;
            })

            const modal = new ModalPrefab("editModal", "closeEditModal");
            modal.openModal();
        }
        function ReportModal(param)
        {
            const modal = new ModalPrefab("reportModal", "closeReportModal");
            modal.openModal();
        }
        function AddModal(param)
        {
            fetch(`/api/admin-general/careers`)
            .then(response => response.json())
            .then(data => {
                let optionsRol = document.getElementById("optionsCareer");
                optionsRol.innerHTML = "";
                data.forEach(career => {
                    optionsRol.innerHTML += `<option value="${career.id}">${career.name}</option>`;
                })
            })
            const modal = new ModalPrefab("addModal", "closeAddModal");
            modal.openModal();
        }
        function XlsxModal(param)
        {
            const modal = new ModalPrefab("xlsxModal", "closeXlsxModal");
            modal.openModal();
        }
        function DeleteUserModal(param)
        {
            const modal = new ModalPrefab("deleteModal", "closeDeleteModal");
            modal.openModal();
        }
    </script>
@endsection



{{-- FILTER --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('filter');
        const rows = document.querySelectorAll('tbody tr');

        searchInput.addEventListener('keyup', function () {
            const searchTerm = this.value.trim().toLowerCase();

            rows.forEach(row => {
                const name = row.querySelector('td:nth-child(2)').textContent.trim().toLowerCase();
                if (name.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
