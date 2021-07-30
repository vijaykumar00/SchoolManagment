<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class RegisterController extends Controller
{
    public function create()
    {
        return view('registeration.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);
        $user = new User();
        $password = $request->input('password');
        $hashed = Hash::make($password);
        $user->firstName = $request->input('firstname');
        $user->lastName = $request->input('lastname');
        $user->password = $hashed;
        $user->email = $request->input('email');
        $user->role_id = $request->input('role');
        $user->save();
        return $this->authenticate($request);
    }
    public function login(Request $request)
    {
        return view('registeration.login');
    }
    public function authenticate(Request $request)
    {
        $users = DB::table('users')->get();
        $role = $request->role;
        if ($role == 2) {
            $credentials = [
                'email' => $request['email'],
                'password' => $request['password'],
            ];
            if (Auth::attempt($credentials)) {
                return view('teacher.home', compact('users'));
            }
        }
        return view('student.dashboard');
    }
    public function loginConfirem(Request $request)
    {
        $user = Auth::user();
        // if ($user->role_id == 1) 
        //   {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        if (Auth::attempt($credentials)) {
            $student = Student::all();
            return  view('teacher.home', compact('student'));
        }
        //  }
        return view('student.dashboard');
    }
}
