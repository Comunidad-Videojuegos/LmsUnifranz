
<?php

use App\Helpers\JasperConnection;
use Illuminate\Support\Facades\Route;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


Route::get('/{studentId}', function (string $studentId) {


    return response()->json([
        [
            "title" => "Calculo",
            "teacher" => "Nombres ApPaterno ApMaterno",
            "progress" => 50.4,
            "image" => "https://c8.alamy.com/compes/2jpc6hp/notas-de-ejercicios-formulas-y-ecuaciones-de-calculo-matematico-con-fondo-negro-de-pizarra-2jpc6hp.jpg"
        ],

        [
            "title" => "Informatica",
            "teacher" => "Nombres ApPaterno ApMaterno",
            "progress" => 60.4,
            "image" => "https://c8.alamy.com/compes/2jpc6hp/notas-de-ejercicios-formulas-y-ecuaciones-de-calculo-matematico-con-fondo-negro-de-pizarra-2jpc6hp.jpg"
        ],

        [
            "title" => "Digitales",
            "teacher" => "Nombres ApPaterno ApMaterno",
            "progress" => 80.4,
            "image" => "https://c8.alamy.com/compes/2jpc6hp/notas-de-ejercicios-formulas-y-ecuaciones-de-calculo-matematico-con-fondo-negro-de-pizarra-2jpc6hp.jpg"
        ],

        [
            "title" => "Videojuegos",
            "teacher" => "Nombres ApPaterno ApMaterno",
            "progress" => 100,
            "image" => "https://c8.alamy.com/compes/2jpc6hp/notas-de-ejercicios-formulas-y-ecuaciones-de-calculo-matematico-con-fondo-negro-de-pizarra-2jpc6hp.jpg"
        ],

        [
            "title" => "Documentacion",
            "teacher" => "Nombres ApPaterno ApMaterno",
            "progress" => 10,
            "image" => "https://c8.alamy.com/compes/2jpc6hp/notas-de-ejercicios-formulas-y-ecuaciones-de-calculo-matematico-con-fondo-negro-de-pizarra-2jpc6hp.jpg"
        ],

        [
            "title" => "Integrador",
            "teacher" => "Nombres ApPaterno ApMaterno",
            "progress" => 10,
            "image" => "https://c8.alamy.com/compes/2jpc6hp/notas-de-ejercicios-formulas-y-ecuaciones-de-calculo-matematico-con-fondo-negro-de-pizarra-2jpc6hp.jpg"
        ],

        [
            "title" => "Programacion",
            "teacher" => "Nombres ApPaterno ApMaterno",
            "progress" => 100,
            "image" => "https://c8.alamy.com/compes/2jpc6hp/notas-de-ejercicios-formulas-y-ecuaciones-de-calculo-matematico-con-fondo-negro-de-pizarra-2jpc6hp.jpg"
        ],

        [
            "title" => "Curso de Gihub",
            "teacher" => "Docente buena onda",
            "progress" => 100,
            "image" => "https://c8.alamy.com/compes/2jpc6hp/notas-de-ejercicios-formulas-y-ecuaciones-de-calculo-matematico-con-fondo-negro-de-pizarra-2jpc6hp.jpg"
        ]
    ]);
});
