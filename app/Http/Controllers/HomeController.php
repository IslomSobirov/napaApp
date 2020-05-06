<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Course;
=======
use Illuminate\Support\Facades\Http;
>>>>>>> c55654d6b266e12c2223c6f34de29402a4992241

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

<<<<<<< HEAD
    public function settings()
    {
        $user = auth()->user();
        
        return view('settings', ['user' => $user]);
    }

    public function course($id)
    {
        $course = Course::findOrFail($id);
        return view('course', ['course' => $course]);
=======
    public function pay(Request $request)
    {
        // $validated = $request->validate([
        //     'merchant' => 'required',
        //     'amount' => 'required',
        //     'account["full_name"]' => 'required',
        //     'account["phone_number"]' => 'required',
        //     'account["contract_id"]' => 'required',  
        // ]);
        
        
        $response = Http::post('https://checkout.paycom.uz', [
            'merchant' => $request->merchant,
            'amount' => $request->amount,
            'account' => [
                'full_name' => $request->account['full_name'],
                'phone_number' => $request->account['phone_number'],
                'contract_id' => $request->account['contract_id']
            ],
            
        ]);
        dd($response);
>>>>>>> c55654d6b266e12c2223c6f34de29402a4992241
    }
}
