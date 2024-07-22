<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function create(Assignment $assignment)
    {
        return view('submissions.create', compact('assignment'));
    }

    public function store(Request $request, Assignment $assignment)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $submission = new Submission($validatedData);
        $submission->assignment_id = $assignment->id;
        $submission->user_id = auth()->user()->id;
        $submission->save();

        return redirect()->route('assignments.show', $assignment);
    }

    public function show(Assignment $assignment, Submission $submission)
    {
        $this->authorize('view', $submission);
        return view('submissions.show', compact('assignment', 'submission'));
    }

    public function download(Assignment $assignment, Submission $submission)
    {
        $this->authorize('download', $submission);
        return response()->download($submission->file_path);
    }

    public function grade(Request $request, Assignment $assignment, Submission $submission)
    {
        $validatedData = $request->validate([
            'grade' => 'required|integer|min:0|max:' . $assignment->total_marks,
        ]);

        $submission->grade = $validatedData['grade'];
        $submission->save();

        return redirect()->route('assignments.show', $assignment);
    }
}