<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Models\Course;


class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::get();
        return view('lessons.index',compact('lessons'));
    }

    public function show($id)
    {
        $lessons = Lesson::where('id',$id)->first();
        return view('lessons.show',compact('lessons'));
    }

    public function create(Course $course)
    {
        $courses = Course::get();
        return view('lessons.create', compact('courses'));
    }

    public function store(Request $request, Course $course)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'video_url' => 'required|url',
            'course_id' => 'nullable',
        ]);
        $course = $course->lessons()->create($validatedData);
           
        return redirect()->route('lessons.index');
    }

    public function edit(Course $course, Lesson $lesson)
    {
        return view('lessons.edit',compact('course','lesson'));
    }

    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'video_url' => 'required|url',
        ]);
    
        $lesson->update($validatedData);
        return redirect()->route('lessons.index', $course);
    }

    public function destroy($id)
    {   
        $lessions = Lesson::where('id',$id)->first();
        $lessions->delete();
        return redirect()->route('lessons.index');
    }
}
