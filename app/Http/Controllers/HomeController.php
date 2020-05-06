<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();
        return view('home', ['courses' => $courses]);
    }


    public function settings()
    {
        $user = auth()->user();
        
        return view('settings', ['user' => $user]);
    }

    public function course($id)
    {
        $course = Course::findOrFail($id);
        return view('course', ['course' => $course]);

    }
    
}
