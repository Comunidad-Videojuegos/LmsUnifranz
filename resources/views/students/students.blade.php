
@extends('layouts.app')

@php
    $titles = ['Nombre', 'Email', 'Editar', 'Historial', 'Eliminar'];
    $fields = $users->map(function($user) {
        return [
            $user->id,
            ($user->userInfo->firstName . '  ' . $user->userInfo->dadLastName . '  ' . $user->userInfo->momLastName),
            $user->email,
        ];
    })->toArray();

    $buttons = [
        ['bi bi-pencil-square', '#278', '#fff', 'EditUserModal'],
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
                    :pageNumber="$pageNumber" link="students" :totalPages="$totalPages" />
            </div>
        </div>
    </div>


    {{-- EDITAR --}}
    <x-modal width="700px" height="400px" title="Editar informacion del usuario" idModal="editModal" idCloseModal="closeEditModal">
        <x-slot name="btn_action">
            <x-button-text id="btnEditUser" color="#fff" bg="#007bff" text="Editar"/>
        </x-slot>
    </x-modal>

    {{-- OBTENER REPORTE --}}
    <x-modal width="400px" height="330px" title="Generar reporte de actividad" idModal="reportModal" idCloseModal="closeReportModal">
        @include('admins.report-admin')
        <x-slot name="btn_action">
            <x-button-text id="btnReportUser" color="#fff" bg="#007bff" text="Generar reporte" function="GenerateReportAdmin"/>
        </x-slot>
    </x-modal>

    {{-- ELIMINAR --}}
    <x-modal width="600px" height="140px" title="¿Esta seguro de eliminar el usuario?" idModal="deleteModal" idCloseModal="closeDeleteModal">
        <x-slot name="btn_action">
            <x-button-text id="btnDeleteUser" color="#fff" bg="#007bff" text="Eliminar"/>
        </x-slot>
    </x-modal>



    <script>

        function EditUserModal(param)
        {
            const modal = new ModalPrefab("editModal", "closeEditModal");
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
