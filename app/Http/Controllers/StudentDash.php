<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentDash extends Controller
{
    public function show()
    {
        $student = Auth::user();
        return view('department.students.studentProfile')->with('student', $student);
    }
    
    //update student profile
    public function profileUpdate(Request $request)
    {
        
    
        $student = Auth::user();
    
            $student->name = $request->name;
            $student->surname = $request->surname;
            $student->email = $request->email;
            $student->matric = $request->matric;

            $student->save();

          return redirect()->route('department.students.studentProfile')->with('message', 'Profile Updated');
    }
   
    public function showResult()
    {
        $student_result = Auth::user()->studentResults;
        
        return view('department.students.studentResult_view', compact('student_result'));
    }
}
