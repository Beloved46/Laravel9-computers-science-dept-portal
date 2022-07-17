<?php

namespace App\Http\Controllers;

class Administrator extends Controller
{
    public function index()
    {
        return redirect()->route('head');
    }

    public function dashboard()
    {
        return view('head');
    }

    public function showAdmin()
    {
        return view('administrator');
    }

    public function all_staff()
    {
        return view('department.all_staff');
    }
}
