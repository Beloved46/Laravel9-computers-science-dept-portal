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

    // public function all_students()
    // {
    //     // $students = User::all();
    //     // $students = User::whereRoleIs('student')->get();
    //     $students = DB::select('select * from users');
    //     // $students = User::whereRoleIs(['student',])->get();
       
        
    //     return view('department.all_student');
    // }
    public function all_staff()
    {
        return view('department.all_staff');
    }
}
