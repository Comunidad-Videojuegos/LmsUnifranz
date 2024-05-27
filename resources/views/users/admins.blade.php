
@extends('layouts.app')

@php
    $titles = ['Nombre', 'Email', 'Editar', 'Roles', 'Actividad','Eliminar'];
    $fields = $users->map(function($user) {
        return [
            $user->id,
            ($user->userInfo->firstName . '  ' . $user->userInfo->dadLastName . '  ' . $user->userInfo->momLastName),
            $user->email,
        ];
    })->toArray();

    $buttons = [
        ['bi bi-pencil-square', '#278', '#fff', 'EditUserModal'],
        ['bi bi-pen-fill', '#670', '#fff', 'RolesUserModal'],
        ['bi bi-file-earmark-medical-fill', '#27a', '#fff', 'ReportUserModal'],
        ['bi bi-trash3-fill', '#700', '#fff', 'DeleteUserModal'],
    ];
@endphp

@section('app-page')
    <div class="h-full">
        <div class="h-[20vh]">

        </div>
        <div class="h-[80vh] relative overflow-auto py-7 px-5">
            <div class="rounded-2xl">
                <x-table :titles="$titles" :fields="$fields" :buttons="$buttons"
                    :pageNumber="$pageNumber" link="admins" :totalPages="$totalPages" />
            </div>
        </div>
    </div>


    {{-- EDITAR ADMIN --}}
    <x-modal width="700px" height="400px" title="Editar informacion del usuario" idModal="editModal" idCloseModal="closeEditModal">
        <x-slot name="btn_action">
            <x-button-text id="btnEditUser" color="#fff" bg="#007bff" text="Editar"/>
        </x-slot>
    </x-modal>

    {{-- EDITAR ROLES --}}
    <x-modal width="700px" height="400px" title="Editar los roles del usuario" idModal="rolesModal" idCloseModal="closeRolesModal">
        <x-slot name="btn_action">
            <x-button-text id="btnEditUser" color="#fff" bg="#007bff" text="Editar"/>
        </x-slot>
    </x-modal>

    {{-- OBTENER REPORTE --}}
    <x-modal width="400px" height="400px" title="Generar reporte de actividad" idModal="reportModal" idCloseModal="closeReportModal">
        <x-slot name="btn_action">
            <x-button-text id="btnEditUser" color="#fff" bg="#007bff" text="Generar reporte"/>
        </x-slot>
    </x-modal>

    {{-- ELIMINAR USUARIO --}}
    <x-modal width="600px" height="140px" title="¿Esta seguro de eliminar el usuario?" idModal="deleteModal" idCloseModal="closeDeleteModal">
        <x-slot name="btn_action">
            <x-button-text id="btnEditUser" color="#fff" bg="#007bff" text="Eliminar"/>
        </x-slot>
    </x-modal>

    {{-- LOADING DE OPERACIONES --}}
    <x-modal width="250px" height="140px" title="" bg="#0000" idModal="loadModal" isClose="true">
        <x-loader width="250px"/>
    </x-modal>


    <script>
        function EditUserModal(param)
        {
            const modal = new ModalPrefab("editModal", "closeEditModal");
            modal.openModal();
            // const modal = new ModalPrefab("loadModal");
            // modal.openModal();
        }
        function RolesUserModal(param)
        {
            const modal = new ModalPrefab("rolesModal", "closeRolesModal");
            modal.openModal();
        }
        function ReportUserModal(param)
        {
            const modal = new ModalPrefab("reportModal", "closeReportModal");
            modal.openModal();
        }
        function DeleteUserModal(param)
        {
            const modal = new ModalPrefab("deleteModal", "closeDeleteModal");
            modal.openModal();
        }
    </script>
@endsection
