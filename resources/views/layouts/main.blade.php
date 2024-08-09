<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unifranz</title>
    <link rel="shortcut icon" href="{{asset('imgs/unifranz.jpeg')}}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>
<body>
  <div class="flex justify-center h-screen items-center flex-col bg-cover"
    style="background-image: url('{{ asset('imgs/fondo_main2.jpeg') }}')">
    {{-- Cabecera de pagina principal --}}
    <div>
        <p class="text-3xl font-bold text-white">
            BIENVENIDO A UNIFRANZ!
        </p>
    </div>
    <br>
    {{-- Contenido de pagina principal --}}
    <div class="h-auto bg-slate-200 rounded-2xl">
      <div class="flex justify-around">
        @yield('content_main')
      </div>
    </div>
  </div>
</body>
</html>
