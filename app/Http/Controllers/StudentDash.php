<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentDash extends Controller
{
    public function show()
    {
        $student = Auth::user();
        // return view('department.students.edit_student')->with('student', $student);
        return view('department.students.studentProfile')->with('student', $student);
    }
    
    //update student profile
    public function profileUpdate(Request $request)
    {
        //validate entry
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'matric' => ['nullable', 'integer', 'starts_with:22', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    
        $student = Auth::user();
    
        // $student->name = is_null($request->name) ? $student->name : $request->name;
        // $student->surname = is_null($request->surname) ? $student->surname : $request->surname;
        // $student->email = is_null($request->email) ? $student->email : $request->email;
        // $student->matric = is_null($request->matric) ? $student->matric : $request->matric;

        // $student->save();
        
            $student->name = $request->name;
            $student->surname = $request->surname;
            $student->email = $request->email;
            $student->matric = $request->matric;

            $student->save();

          return view('department.students.studentProfile')->with('message', 'Profile Updated');
    }
   
    public function showResult()
    {
        $student_result = Auth::user()->studentResults;
        
        return view('department.students.studentResult_view', compact('student_result'));
    }
}
