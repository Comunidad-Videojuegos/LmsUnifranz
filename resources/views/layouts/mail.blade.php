<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .content {
            padding: 20px;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="header">
        <div style="text-align: center; padding: 20px;">
            <img src="{{ asset('imgs/unifranz.jpeg') }}" alt="Logo Aula Virtual" style="max-width: 150px;">
            <h1 style="margin: 0;">Aula Virtual</h1>
        </div>
    </div>

    <div class="content">
        <div style="padding: 20px;">
            <h2 style="color: #333;">Hola, {{ $name }}</h2>
            <p style="font-size: 16px; color: #555;">
                {{ $message }}
            </p>
        </div>
    </div>

    <div class="footer">
        <div style="text-align: center; padding: 20px; background-color: #f8f8f8;">
            <p style="font-size: 14px; color: #777;">
                &copy; {{ date('Y') }} Aula Virtual. Todos los derechos reservados.
            </p>
            <p style="font-size: 14px; color: #777;">
                <a href="{{ url('/') }}" style="color: #007BFF;">Visita nuestro sitio web</a> |
                <a href="{{ url('/contact') }}" style="color: #007BFF;">Contáctanos</a>
            </p>
        </div>
    </div>
</body>
</html>
