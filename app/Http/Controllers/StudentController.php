<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Models\Assignment;
use App\Models\asgnmentsub;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::all();
        return view('student.dashboard', compact('student'));
    }
    public function registerStudent()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'firstname' => 'required|min:6',
            'lastname' => 'required|min:6',
            'class' => 'required',
            'profile_image' => 'required'
        ]);
        if ($validate) {
            $student = new Student;
            $student->firstname = $request->input('firstname');
            $student->lastname = $request->input('lastname');
            $student->class = $request->input('class');
            $student->user_id = Auth::user()->id;
            if ($request->hasfile('profile_image')) {
                $file = $request->file('profile_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/students/', $filename);
                $student->image = $filename;
            }
            $student->save();
            return redirect('/student.dashboard');
        }
        return redirect('/student.create')->with('message', 'Information are Incorrect');
    }
    public function showAsg()
    {
        $asgnment = DB::table('assignments')
            ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
            ->join('teachers', 'teachers.id', '=', 'assignments.teachr_id')->get();
        // ->whereDate('created_at', '=', date('Y-m-d'))->get();
        // dd($asgnment);

        return view('student.showAsgnment', compact('asgnment'));
    }
    public function submitAsg(Request $request)
    {
        // $asgnment = Assignment::all();
        // return view('student.submitAsg', compact('asgnment'));
        $asgnment = DB::table('assignments')
            ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
            ->join('teachers', 'teachers.id', '=', 'assignments.teachr_id')->get();
        return view('student.submitAsg', compact('asgnment'));
    }
    public function showStudnt()
    {
        $student = Student::all();

        return view('student.showClass', compact('student'));
    }
}
