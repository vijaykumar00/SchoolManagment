<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        ], [
            'firstname.required' => 'Enter Your first Name',
            'lastname.required' => 'enter your lastname',
            'class.required' => 'enter your class',
            'profile_image.required' => 'upload your image'
        ]);
        if ($validate) {
            $user = new User();
            $password = $request->input('password');
            $hashed = Hash::make($password);
            $user->firstName = $request->input('firstname');
            $user->lastName = $request->input('lastname');
            $user->password = $hashed;
            $user->email = $request->input('email');
            $user->role_id = 1;
            if ($user->save()) {
                $student = new Student;
                $student->firstname = $request->input('firstname');
                $student->lastname = $request->input('lastname');
                $student->user_id = $user->id;
                $student->class = $request->input('class');
                if ($request->hasfile('profile_image')) {
                    $file = $request->file('profile_image');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extention;
                    $file->move('uploads/students/', $filename);
                    $student->image = $filename;
                }
                $student->save();
                return view('/student.dashboard');
            }
        }
        return redirect('/student.create');
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
    public function filterbydate(Request $request)
    {
        $from = $request->input('from_date');
        $to = $request->input('to_date');
        $user_id = Auth::user()->id;
        $student = DB::table('students')->where('user_id', $user_id)->first();
        $daterange = asgnmentsub::where('student_id', $student->id)->whereBetween('created_at', [$from, $to])->get();
        $submitedAsg = DB::table('asgnmentsubs')->where('student_id', $student->id)
            ->join('assignments', 'assignments.id', '=', 'asgnmentsubs.asg_id')
            ->join('students', 'students.id', '=', 'asgnmentsubs.student_id')->get();
        return view('student.Asgbydate', ['daterange' => $daterange], ['submitedAsg' =>  $submitedAsg]);
    }
    public function submitAsg(Request $request)
    {
        $asgnment = DB::table('assignments')
            ->join('subjects', 'subjects.id', '=', 'assignments.subject_id')
            ->join('teachers', 'teachers.id', '=', 'assignments.teachr_id')
            ->select('assignments.id', 'assignments.asgname', 'teachers.name', 'subjects.subject', 'assignments.class')
            ->get();
        return view('student.submitAsg', compact('asgnment'));
    }
    public function showStudnt()
    {
        $student = Student::all();

        return view('student.showClass', compact('student'));
    }
    public function uploadedAsg()
    {
        $user_id = Auth::user()->id;
        $student = DB::table('students')->where('user_id', $user_id)->first();
        $submitedAsg = DB::table('asgnmentsubs')->where('student_id', $student->id)
            ->join('assignments', 'assignments.id', '=', 'asgnmentsubs.asg_id')
            ->join('students', 'students.id', '=', 'asgnmentsubs.student_id')->get();
        // dd($submitedAsg);
        return view('student.showsubmitAsg', compact('submitedAsg'));
    }
    public function submitAsgnment(Request $request)
    {
        // $student_id = Auth::user()->id;
        // $validate = $request->validate(
        //     [
        //         'Asgname' => 'required',
        //         // 'subject' => 'required',
        //         // 'class' => 'required',
        //         'document' => 'required|mimes:doc,pdf'
        //     ],
        // );
        // if ($validate) {
        $user_id = Auth::user()->id;
        $student = DB::table('students')->where('user_id', $user_id)->first();
        $submission = new asgnmentsub();
        $submission->student_id = $student->id;
        // dd($request->Asgname);
        $submission->asg_id = $request->Asgname;
        // dd($request->Asgname);

        $submission->document = $request->document;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension('document');
            $filename = time() . '.' . $extension;
            $file->move('uploads/Asgnments/', $filename);
            $submission->document = $filename;
        }
        $submission->save();
        return redirect('/see-asg');
        // }
    }
}
