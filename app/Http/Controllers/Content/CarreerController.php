<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Integration\INP_Career;

class CarreerController extends Controller
{
    public function index(Request $request)
    {
        $pageNumber = $request->input('pageNumber', 1); // Obtener el número de página o usar 1 si no está definido
        $perPage = 10; // Número de registros por página
        $offset = ($pageNumber - 1) * $perPage;

        $totalCareers = INP_Career::count();
        $totalPages = ceil($totalCareers / $perPage);

        $careers = INP_Career::select('id', 'name', 'initials')
            ->skip($offset)
            ->take($perPage)
            ->get();

        return view('carreers.carreers')
            ->with('careers', $careers)
            ->with('totalPages', $totalPages)
            ->with('totalCareers', $totalCareers)
            ->with('pageNumber', $pageNumber);
    }
}
