<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Models\asgnmentsub;
use Illuminate\Support\Facades\Auth;

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
        $validate = $request->validate([
            'Asgname' => 'required',
            'description' => 'required',
            'subject' => 'required',
            'class' => 'required'
        ]);
        if ($validate) {
            $student = Student::all();
            $asgnment = new Assignment();
            $asgnment->asgname = $request->input('Asgname');
            $asgnment->description = $request->input('description');
            $asgnment->subject_id = $request->input('subject');
            $asgnment->class = $request->input('class');
            $asgnment->save();
            return redirect('editAsg');
        }
        return redirect('teacher.newAsg')->with('message', 'Assign proper values');
    }
    public function showStudent()
    {
        $student = Student::all();
        return view('teacher.showStudent', compact('student'));
    }
    public function showsubmitedAsg()
    {
        // $asg=asgnmentsub::all();
        return view('teacher.showsubmitasg');
    }
    public function submitAsg(Request $request)
    {
        $student_id = Auth::user()->id;
        $validate = $request->validate(
            [
                'Asgname' => 'required',
                // 'subject' => 'required',
                // 'class' => 'required',
                'document' => 'required'
            ],
            [
                'Asgname.required' => 'Select the name of the asgnments',
                // 'subject.required' => 'Select name of the subject',
                // 'class.required' => 'select the class',
                'document.required' => 'upload file'
            ]
        );
        if ($validate) {
            // $asg_id = DB::table('assignments')->select('id')->get();
            $submission = new asgnmentsub();
            // $submission->asg_id = $request->Asgname;
            // $submission->student_id = $student_id;
            $submission->document = $request->document;
            $submission->save();
            return redirect('/see-asg');
        }
    }
    public function editAsg()
    {
        $asgnment = DB::table('assignments')->get();
        return view('teacher.editAsg', compact('asgnment'));
    }
    public function edit($id)
    {
        $asg = DB::select('select * from assignments where id=?', [$id]);
        return view('teacher.showasg', compact('asg'));
    }
    public function updateAsg(Request $request, $id)
    {
        $asgname = $request->input('Asgname');
        $description = $request->input('description');
        $subject = $request->input('subject');
        $class = $request->input('class');
        $update = DB::table('assignments')
            ->where('id', $id)
            ->update([
                'asgname' => $asgname,
                'description' => $description,
                'subject_id' => $subject,
                'class' => $class
            ]);
        if ($update) {
            return redirect('editAsg');
        }
    }
    public function destroy($id)
    {
        DB::delete('delete from assignments where id =?', [$id]);
        return redirect('editAsg');
    }
}
