<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Models\asgnmentsub;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.home');
    }

    public function createAsgnment()
    {
        $subject = DB::table('subjects')->get();
        return view('teacher.newAsg', compact('subject'));
    }
    public function store(Request $request)
    {
        $asgnment = new Assignment();
        $asgnment->asgname = $request->input('Asgname');
        $asgnment->description = $request->input('description');
        $asgnment->subject_id = $request->input('subject');
        $asgnment->class = $request->input('class');
        $asgnment->save();
        return view('teacher.home')->with('created', 'asgnment created successfully');
    }
    public function showStudent()
    {
        $student = Student::all();
        return view('teacher.showStudent', compact('student'));
    }
}
