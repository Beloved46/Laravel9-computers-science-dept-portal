<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = User::whereRoleIs('staff')->get();
        
        return view('department.all_staff', ['staffs'=>$staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.staff.create_staff');
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
        $staff = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);
        $staff->attachRole('staff');

        Password::sendResetLink($request->only(['email']));

        if($staff->save()) {
            return redirect()->route('allstaff.index');
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
        $staff = User::findOrfail($id);
        return view('department.staff.show_staff')->with('staff', $staff);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = User::findOrfail($id);
        return view('department.staff.edit_staff')->with('staff', $staff);
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
        $staff = User::where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
    ]);
          return redirect()->route('allstaff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = User::find($id);
        $staff->delete();
        return redirect()->route('allstaff.index');
    }
}
