<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }


    public function index()
    {
        $courses = Course::all();
        return view('course/index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'teacherName' => 'required',
            'courseName' => 'required',
            'courseDuration' => 'required',
            'coursePlan' => 'required',
            'courseResult' => 'required',
            'courseStart' => 'required',
            'courseSpeciality' => 'required',
            'groupNumber' => 'required',
            'studentNumber' => 'required',
        ]);

        Course::create($validated);

        return redirect()
                ->route('admin')
                ->with('msg', 'Курс создано успешно!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
