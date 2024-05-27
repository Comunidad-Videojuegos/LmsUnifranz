<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarreerController extends Controller
{
    public function index()
    {
        return view('carreers.carreers');
    }
}
