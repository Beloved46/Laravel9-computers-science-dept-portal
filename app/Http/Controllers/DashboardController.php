<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
       
        if(Auth::user()->hasRole('student')) {
            return view('student');   

        } elseif(Auth::user()->hasRole('staff')) {
            return view('staff');

        } elseif(Auth::user()->hasRole('administrator')) {
            return view('head');
        }
         
    }
}
