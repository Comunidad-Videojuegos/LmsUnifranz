
@extends('layouts.app')

@php
    $titles = ['Nombre', 'Iniciales', 'Editar', 'Eliminar'];
    $fields = $courses->map(function($course) {
        return [
            $course->id,
            $course->name,
            $course->initials,
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
                <button class="bg-[#456] py-3 px-6 rounded-2xl">
                    Agregar
                </button>
            </div>
        </div>
        <div class="h-[80vh] relative overflow-auto py-7 px-5">
            <div class="rounded-2xl">
                <x-table :titles="$titles" :fields="$fields" :buttons="$buttons" :hasIcon=false
                    :pageNumber="$pageNumber" link="courses" :totalPages="$totalPages" />
            </div>
        </div>
    </div>


    {{-- EDITAR --}}
    <x-modal width="800px" height="550px" title="Editar informacion del curso" idModal="editModal" idCloseModal="closeEditModal">
        @include('courses.update-course')
        <x-slot name="btn_action">
            <x-button-text id="btnEditUser" color="#fff" bg="#007bff" text="Editar" function="UpdateCourse"/>
        </x-slot>
    </x-modal>

    {{-- ELIMINAR --}}
    <x-modal width="600px" height="140px" title="¿Esta seguro de eliminar este curso?" idModal="deleteModal" idCloseModal="closeDeleteModal">
        <x-slot name="btn_action">
            <x-button-text id="btnDeleteUser" color="#fff" bg="#007bff" text="Eliminar"/>
        </x-slot>
    </x-modal>



    <script>

        function EditUserModal(param)
        {
            let array = JSON.parse(param);
            localStorage.setItem("idCourseSystem", array[0])

            fetch(`/api/integration/instructors`)
            .then(response => response.json())
            .then(data => {

                document.getElementById('ins_cur').innerHTML = "";
                data.forEach((instructor) =>
                {
                    document.getElementById('ins_cur').innerHTML += `
                        <option value="${instructor.id}">${instructor.name}</option>
                    `;
                })
            })

            fetch(`/api/content/course-info?id=${array[0]}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('name_cur').value = data.name;
                document.getElementById('desc_cur').value = data.description;
                document.getElementById('lin_cur').value = data.groupLink;
                document.getElementById('man_cur').checked = data.mandatory;
                document.getElementById('ini_cur').value = data.initials;
                document.getElementById('ins_cur').value = data.instructorId;
            })

            const modal = new ModalPrefab("editModal", "closeEditModal");
            modal.openModal();
        }
        function DeleteUserModal(param)
        {
            const modal = new ModalPrefab("deleteModal", "closeDeleteModal");
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
