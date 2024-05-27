<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvidenceController extends Controller
{
    public function index()
    {
        return view('evidences.evidences');
    }
}
