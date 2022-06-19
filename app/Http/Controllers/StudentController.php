<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::whereRoleIs('student')->orderBy('id', 'desc')->paginate(10);
        // $students = User::orderBy('id', 'desc')->paginate(5);
        
        return view('department.all_student', ['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.students.create_student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $student = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'matric' => $request->matric,
            'password' => Hash::make($request->password), 
        ]);
        $student->attachRole('student');
        if($student->save()) {
            $request->session()->flash('status', 'student added successfully');
            return redirect()->route('allstudents.index');
        } else {
            $request->session()->flash('danger', 'sorry an error occured while creating user');
            return redirect()->route('allstudents.create');
        };
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = User::findOrfail($id);
        return view('department.students.show_student')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::findOrfail($id);
        return view('department.students.edit_student')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = User::where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'matric' => $request->input('matric')
    ]);
          return redirect()->route('allstudents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        
        // $student->delete();
        // return redirect()->route('allstudents.index');
    }
}
