<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PspiController extends Controller
// <!-- RENDER HOME WEB PSPI -->
// {{-- HANDLE BY ALDO OR FAISAL--}}
{
    public function index()
    {
        return view('pspi.index');
    }
}
