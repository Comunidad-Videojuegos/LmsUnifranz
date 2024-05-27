@php
    use App\Models\Users\USR_AppSection;
    $sections = USR_AppSection::orderBy('group', 'asc')->get();;
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unifranz</title>
    @vite('resources/css/app.css')

    {{-- LINKS PARA USAR TOASTR --}}
    <link rel="shortcut icon" href="{{asset('imgs/unifranz.jpeg')}}" type="image/x-icon">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    {{-- BOOSTRAP ICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>
<body  class="bg-gray-900 text-white">
    <div class="h-screen flex flex-row">
        {{-- MENU LATERAL --}}
        <div class="bg-[var(--bg-color)] w-1/5 min-w-64 rounded-e-2xl">

            {{-- NAVEGACIÓN EN COMPUTADORA --}}
            <div class="bg-[var(--bg-color)] w-full h-screen flex flex-col justify-between rounded-e-2xl">

                {{-- CABECERA DE NAVEGACION --}}
                <div class="h-1/4">
                    <div class="flex-grow h-full pt-10 pb-10">
                        <img src="{{asset('imgs/unifranz.jpeg')}}" class="object-contain w-full h-full">
                    </div>
                </div>

                {{-- CONTENIDO DE NAVEGACION --}}
                <div class="h-3/4 relative overflow-auto">

                    {{-- Agrupar las secciones por el campo 'group' --}}
                    @php
                        $groupedSections = $sections->groupBy('group');
                    @endphp

                    {{-- ITEMS NAV --}}
                    @foreach ($groupedSections as $group => $groupSections)

                        @switch($group)
                            @case(1)
                                <h3 class="py-5 pl-10 font-bold">Usuarios</h3>
                                @break
                            @case(2)
                                <h3 class="py-5 pl-10 font-bold">Contenido</h3>
                                @break
                            @case(3)
                                <h3 class="py-5 pl-10 font-bold">Actividades</h3>
                                @break
                            @case(4)
                                <h3 class="py-5 pl-10 font-bold">Plataforma</h3>
                                @break
                            @case(5)
                                <h3 class="py-5 pl-10 font-bold">Seguridad</h3>
                                @break

                            @default

                        @endswitch

                        @foreach ($groupSections as $item)
                            <x-nav-item
                                link="{{ $item->link }}"
                                title="{{ $item->name }}"
                                icon="{{ $item->icon }}"
                            />
                        @endforeach
                    @endforeach

                    <div class="py-10 text-red-600">
                        <x-nav-item
                            link="init-app"
                            title="Cerrar Session"
                            icon="bi bi-backspace-reverse-fill"
                        />
                    </div>
                </div>
            </div>
        </div>

        {{-- CONTENIDO QUE TENDRA POR CADA UNO --}}
        <div class="w-4/5 relative overflow-auto">
            @yield('app-page')
        </div>
    </div>
    <script>
        function toasini()
        {
            toastr.info('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 20000})
        }
    </script>

    <script>
        class ModalPrefab {
            constructor(modalId, closeModalButtonId) {
                this.modal = document.getElementById(modalId);
                this.closeModalButton = document.getElementById(closeModalButtonId);
                this.initialize();
            }

            initialize() {
                if (this.closeModalButton) {
                    this.closeModalButton.addEventListener('click', () => this.closeModal());
                }
            }

            openModal() {
                this.modal.classList.remove('close');
                this.modal.classList.add('open');
            }

            closeModal() {
                this.modal.classList.remove('open');
                this.modal.classList.add('close');
                this.modal.addEventListener('animationend', () => {
                    this.modal.close();
                }, { once: true });
            }
        }
    </script>

</body>
</html>
