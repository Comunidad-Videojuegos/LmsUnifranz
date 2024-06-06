<?php

namespace App\Http\Controllers\Integration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Integration\INP_Gestion;
use Illuminate\Support\Facades\DB;

class GestionController extends Controller
{
    public function gestions(Request $request)
    {
        return INP_Gestion::all();
    }
}
