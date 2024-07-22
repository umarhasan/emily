<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images/courses'), $imageName);

            $validatedData['image'] = $imageName;
        }
        $course = Course::create($validatedData);
      
        return redirect()->route('courses.index');
    }

    public function show($id)
    {
        $course = Course::with('lessons')->where('id',$id)->first();
        $lessons = $course->lessons()->get();
        // $quizzes = $course->quizzes()->get();
        // $assignments = $course->assignments()->get();
        return view('courses.show',compact('lessons'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images/courses'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $course->update($validatedData);
        return redirect()->route('courses.index', $course);
    }

    public function destroy($id)
    {   
        $course = Course::where('id',$id)->first();
        $course->delete();
        return redirect()->route('courses.index');
    }
}
