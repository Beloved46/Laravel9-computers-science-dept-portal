<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDash extends Controller
{
    public function show()
    {
        return view('department.students.studentProfile');
    }
    public function showResult()
    {
        
        return view('department.students.studentResult_view');
    }
}
