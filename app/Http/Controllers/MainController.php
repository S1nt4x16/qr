<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index() {

        return view('index');
    }

    public function validasiQrcode(Request $request) {
        
    }
}
