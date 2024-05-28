@extends('layouts.mail')

@section('head-mail')
        <div style="text-align: center; padding: 20px;">
            <img src="{{ asset('~/public/imgs/unifranz.jpeg') }}" alt="Logo Aula Virtual" style="max-width: 150px;">
            <h1 style="margin: 0;">Aula Virtual</h1>
        </div>
@endsection
@section('content-mail')
        <div style="padding: 20px;">
            <h2 style="color: #333;">Hola, {{ $name }}</h2>
            <p style="font-size: 16px; color: #555;">
                {{ $messageContent }}
            </p>
        </div>
@endsection
@section('footer-mail')
        <div style="text-align: center; padding: 20px; background-color: #f8f8f8;">
            <p style="font-size: 14px; color: #777;">
                &copy; {{ date('Y') }} Aula Virtual. Todos los derechos reservados.
            </p>
            <p style="font-size: 14px; color: #777;">
                <a href="{{ url('/') }}" style="color: #007BFF;">Visita nuestro sitio web</a> |
                <a href="{{ url('/contact') }}" style="color: #007BFF;">Contáctanos</a>
            </p>
        </div>
@endsection
