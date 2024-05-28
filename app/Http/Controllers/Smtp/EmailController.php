<?php

namespace App\Http\Controllers\Smtp;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\HelloMail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $name = 'John Doe';
        Mail::to('callelazodeynarluis@gmail.com')->send(new HelloMail($name));
        return response()->json('Email sent successfully!');
    }
}
