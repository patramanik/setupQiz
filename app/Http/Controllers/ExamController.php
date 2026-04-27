<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = \App\Models\Exam::all();
        return view('admin.exams.index', compact('exams'));
    }

    public function create()
    {
        return view('admin.exams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        \App\Models\Exam::create([
            'name' => $request->name,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('exams.index')->with('success', 'Exam created successfully.');
    }

    public function edit(\App\Models\Exam $exam)
    {
        return view('admin.exams.edit', compact('exam'));
    }

    public function update(Request $request, \App\Models\Exam $exam)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $exam->update([
            'name' => $request->name,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('exams.index')->with('success', 'Exam updated successfully.');
    }

    // --- Subject Management Methods ---

    public function subjectIndex()
    {
        $subjects = \App\Models\Subject::with('exam')->get();
        return view('admin.subjects.index', compact('subjects'));
    }

    public function subjectCreate()
    {
        $exams = \App\Models\Exam::where('is_active', true)->get();
        return view('admin.subjects.create', compact('exams'));
    }

    public function subjectStore(Request $request)
    {
        $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        \App\Models\Subject::create([
            'exam_id' => $request->exam_id,
            'name' => $request->name,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    public function subjectEdit(\App\Models\Subject $subject)
    {
        $exams = \App\Models\Exam::where('is_active', true)->get();
        // Include the subject's exam if it's inactive just in case
        if ($subject->exam && !$subject->exam->is_active && !$exams->contains($subject->exam->id)) {
            $exams->push($subject->exam);
        }
        return view('admin.subjects.edit', compact('subject', 'exams'));
    }

    public function subjectUpdate(Request $request, \App\Models\Subject $subject)
    {
        $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $subject->update([
            'exam_id' => $request->exam_id,
            'name' => $request->name,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function subjectDestroy(\App\Models\Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
