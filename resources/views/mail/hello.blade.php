@extends('layouts.mail')

@section('head-mail')
    <h1>
        CABECERA
    </h1>
@endsection
@section('content-mail')
    <h1>
        CONTENIDO

        Hola: {{$name}}
    </h1>
@endsection
@section('footer-mail')
    <h1>
        PIE DE PAGINA
    </h1>
@endsection
