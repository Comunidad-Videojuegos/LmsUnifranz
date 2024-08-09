@extends('layouts.mail')

@section('content-mail')
    <div style="padding: 20px;">
        <h2 style="color: #333;">Hola, {{ $user_name }} </h2>
        <h3 class="font-bold text-2xl">
            {{ $name }}
        </h3>
        <p style="font-size: 24px; color: #555;">
            {!! $msg !!}
        </p>
    </div>
@endsection
