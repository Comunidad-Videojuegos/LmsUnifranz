<?php

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisementsController extends Controller
{

    public function index()
    {
        return view('advertisements.advertisements');
    }
}
