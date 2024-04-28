<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/demojson', function () {
    $json = [
        [
            "name" => "John Doe",
            "email"=> "john@example.com",
            "age" => 30
        ],

        [
            "name" => "John Doe",
            "email"=> "john@example.com",
            "age" => 30
        ]
    ];
    return response()->json($json);
});

// COURSES

Route::prefix('courses')->group(function()
    {
        include __DIR__. '/content/courses.php';
    }
);



// REPORTES
Route::prefix('report')->group(function()
    {
        include __DIR__. '/report/demo.report.php';
    }
);
