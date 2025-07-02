<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PustakapemdaController extends Controller
// <!-- RENDER VIEW WEB PUSTAKAPEMDA -->
// {{-- HANDLE BY ALDO OR FAISAL--}}
{
    public function index()
    {
        return view('pustakapemda.index');
    }
}
