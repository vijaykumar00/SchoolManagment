<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Teacher;

class RegisterController extends Controller
{
    public function create()
    {
        return view('registeration.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|max:10|',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);
        if ($validated) {
            $user = new User();
            $password = $request->input('password');
            $hashed = Hash::make($password);
            $user->firstName = $request->input('firstname');
            $user->lastName = $request->input('lastname');
            $user->password = $hashed;
            $user->email = $request->input('email');
            $user->role_id = $request->input('role');
            if ($user->save()) {
                if ($user->role_id == 1) {
                    $student = new Student();
                    $student->firstName = $request->input('firstname');
                    $student->lastName = $request->input('lastname');
                    $student->user_id = $user->id;
                    $student->save();
                } else {
                    $teacher = new Teacher();
                    $teacher->name = $request->input('firstname');
                    $teacher->user_id = $user->id;
                    $teacher->save();
                }
            }
            return $this->authenticate($request);
        }
        return redirect('/registeration.create');
    }
    // public function createStudent()
    // {
    // }
    // public function createTeacher()
    // {
    // }
    public function login(Request $request)
    {
        return view('registeration.login');
    }
    public function authenticate(Request $request)
    {
        // dd($request);
        $student = Student::all();
        // $users = DB::table('users')->get();
        $role = $request->role;
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        if (Auth::attempt($credentials)) {
            if ($role == 2) {
                $credentials = [
                    'email' => $request['email'],
                    'password' => $request['password'],
                ];
                // if (Auth::attempt($credentials)) {
                return view('teacher.home', compact('student'));
                // }
            }
            return view('student.dashboard');
        }
    }
    public function loginConfirem(Request $request)
    {
        $validate = $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.requiredd' => 'email is incorrect',
                'password.required' => 'Fill the Correct Password'
            ]
        );
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role_id == 1) {
                // $user = Auth::user();
                // dd($user);
                return  view('student.dashboard');
            }
            $student = Student::all();
            return view('teacher.home', compact('student'));
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
