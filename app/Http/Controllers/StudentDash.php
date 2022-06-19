<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentDash extends Controller
{
    public function show()
    {
        return view('department.students.studentProfile');
    }
    public function showResult()
    {
        $student_result = Auth::user()->studentResults;
        
        return view('department.students.studentResult_view', compact('student_result'));
    }
}
