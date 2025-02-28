<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TouristeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:touriste');
    }

    public function dashboard()
    {
        
       
        
        
        return view('touriste.dashboard');
    }
}
