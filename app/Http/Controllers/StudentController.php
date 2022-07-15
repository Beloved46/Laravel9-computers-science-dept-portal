<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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
            'matric' => ['nullable', 'integer', 'starts_with:22', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $password_entry = new Request;
        if ($password_entry->has('password') && !empty($request->password)) {
            $password = trim($request->password);
        } else {
            //generate random password
            $length = 10;
            $keyspace = '12345678abcdefijklmnopqrstABCDEFGHIJKLMNOP';
            $str = "";
            $max = mb_strlen($keyspace, '8bit') -1;
            for ($i = 0; $i < $length; $i++) {
                $str .= $keyspace[random_int(0, $max)];
            };
            $password = $str;
        }
        $student = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'matric' => $request->matric,
            'password' => Hash::make($request->password), 
        ]);
        
        $student->attachRole('student');

        Password::sendResetLink($request->only(['email']));
        
        if ($student->save()) {
            return redirect()->route('allstudents.index');
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
    public function destroy($id)
    {
        $student = User::find($id);
        $student->delete();
        return redirect()->route('allstudents.index');
    }
}
