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
        return view('student.dashboard')->with('successMsg', 'Asgnment submited successfully');
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
    public function destroy($id){
        DB::delete('delete from assignments where id =?',[$id]);
        return redirect('editAsg')  ;
    }
}
