<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function create(Course $course)
    {
        return view('assignments.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);

        $assignment = $course->assignments()->create($validatedData);
        return redirect()->route('courses.show', $course);
    }

    public function edit(Course $course, Assignment $assignment)
    {
        return view('assignments.edit', compact('course', 'assignment'));
    }

    public function update(Request $request, Course $course, Assignment $assignment)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);

        $assignment->update($validatedData);
        return redirect()->route('courses.show', $course);
    }

    public function destroy(Course $course, Assignment $assignment)
    {
        $assignment->delete();
        return redirect()->route('courses.show', $course);
    }
}