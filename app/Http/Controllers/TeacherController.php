<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Models\asgnmentsub;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use Illuminate\Testing\Constraints\SoftDeletedInDatabase;

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
            // $student = Student::all();
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
        $submitedAsg = DB::table('asgnmentsubs')
            ->join('assignments', 'assignments.id', '=', 'asgnmentsubs.asg_id')
            ->join('students', 'students.id', '=', 'asgnmentsubs.student_id')->get();
        return view('teacher.showsubmitasg', compact('submitedAsg'));
    }

    public function editAsg()
    {
        $asgnment = Assignment::all();
        return view('teacher.editAsg', compact('asgnment'));
    }
    public function edit($id)
    {
        $asg = DB::select('select * from assignments where id=?', [$id]);
        return view('teacher.showasg', compact('asg'));
    }
    public function updateAsg(Request $request, $id)
    {
        $validate = $request->validate([
            'Asgname' => 'required',
            'description' => 'required',
            'subject' => 'required',
            'class' => 'required'
        ], [
            'Asgname.required' => 'enter asgnament name',
            'description.required' => 'enter description',
            'subject.required' => 'select the subject',
            'class.required' => 'select the class'
        ]);
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
        // dd($id);
        // DB::delete('delete from assignments where id =?', [$id]);
        // return redirect('editAsg');
        $delete = Assignment::where('id', $id);
        $delete->delete();
        return redirect('editAsg');
    }
    public function giveGrade(Request $request, $id)
    {
        // dd($id);

        return view('teacher.showgrade', compact('id'));
    }
    public function gradegiven(Request $request, $id)
    {
        $givengrade = $request->input('grade');
        // dd($givengrade);
        $grade = DB::table('asgnmentsubs')
            ->where('id', $id)->update([
                'grades' => $givengrade
            ]);
        // ->update([
        //     'grades' => $givengrade
        // ]);
        return redirect('/submited-asg')->with('success', 'grade is given');
    }
}
