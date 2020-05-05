<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        return view('home');
    }

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
    }
}
