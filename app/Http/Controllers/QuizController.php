<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quiz = Quiz::get();
        return view('quizzes.index',compact('quiz'));
    }

    public function show($id)
    {
        $quiz = Quiz::where('id',$id)->first();
        return view('quizzes.show',compact('quiz'));
    }

    public function create(Course $course)
    {
        $courses = Course::get();
        return view('quizzes.create', compact('courses'));
    }

    public function store(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'time_limit' => 'required|integer',
            'course_id' => 'nullable',
        ]);
       
        $course = $course->quizzes()->create($validatedData);
        return redirect()->route('quizzes.index');
    }

    public function edit(Course $course, Quiz $quiz)
    {
        $course = $course->get();
   
        return view('quizzes.edit', compact('course', 'quiz'));
    }

    public function update(Request $request, Course $course, Quiz $quiz)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'time_limit' => 'required|integer',
            'course_id' => 'required',
        ]);
        
        $quiz->update($validatedData);
        return redirect()->route('quizzes.index');
    }

    public function destroy($id)
    {
        $quiz = Quiz::where('id',$id)->first();
        $quiz->delete();
        return redirect()->route('quizzes.index');
    }
}
