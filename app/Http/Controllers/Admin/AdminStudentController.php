<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class AdminStudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    public function show($studentId)
    {
        $student = Student::where('student_id', $studentId)->with(['profile', 'walletHistories'])->firstOrFail();
        return view('admin.students.show', compact('student'));
    }

    public function edit($studentId)
    {
        $student = Student::where('student_id', $studentId)->with('profile')->firstOrFail();
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, $studentId)
    {
        $student = Student::where('student_id', $studentId)->firstOrFail();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'mail' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'high_qlc' => 'nullable|string',
            'gender' => 'nullable|string',
            'dob' => 'nullable|date',
        ]);

        $student->update([
            'name' => $request->name,
        ]);

        if ($student->profile) {
            $student->profile->update([
                'name' => $request->name,
                'mail' => $request->mail,
                'address' => $request->address,
                'high_qlc' => $request->high_qlc,
                'gender' => $request->gender,
                'dob' => $request->dob,
            ]);
        }

        return redirect()->route('admin.students.show', $studentId)->with('success', 'Student profile updated successfully');
    }
}
