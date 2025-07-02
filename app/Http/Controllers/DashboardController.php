<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
// INI UNTUK RENDER VIEW DASHBOARD 
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
