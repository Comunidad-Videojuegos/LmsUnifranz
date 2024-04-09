@extends('../layouts.main')

@section('content_main')

  <div class="p-5 m-auto w-80">
    <div>
      <div>
        <h1 class="text-3xl font-extrabold text-center">Aula virtual</h1>
      </div>
      <br>
      <div class="flex justify-center">
        <img src="{{ asset('imgs/aula_virtual.png') }}" width="140">
      </div>
      <br>
      <div class="flex justify-center flex-col">
        <div class="p-1">
            <a href="/google-auth/redirect">
                <button class="text-center bg-slate-300 py-2 px-1 w-full rounded-xl border-spacing-0.5 broder-black
                  hover:bg-slate-700 hover:text-white active:bg-slate-900
                  transition-colors duration-150 ease-in-out">
                  Ingresar con cuenta de google
                </button>
            </a>
        </div>
        <br>
        <div class="p-1">
          <a href="{{route('login')}}">
            <button class="text-center bg-slate-300 py-2 px-1 w-full rounded-xl border-spacing-0.5 broder-black
                hover:bg-slate-700 hover:text-white active:bg-slate-900
                transition-colors duration-150 ease-in-out">
                Ingresar contraseña
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>

@endsection
