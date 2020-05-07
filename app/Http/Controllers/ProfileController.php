<?php

namespace App\Http\Controllers;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ProfileController extends Controller
{
    public function createProfile(Request $request)
    {
        $user = \Auth::user();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'number' => ['required'],
            'captcha' => 'required|captcha',
            'email' => ['required', 'string', 'email', 'max:255'],
            'image' => 'required|mimes:jpeg,png',
            'passportCopy' => 'required|mimes:doc,docx,pdf|max:2048',
            'inn' => 'required|mimes:doc,docx,pdf|max:2048',
            'inn2' => 'mimes:doc,docx,pdf|max:2048',
            'agreement' =>'accepted'
        ]);

        
        $imageName = $user->id.'_avatar'.time().'.'.request()->image->getClientOriginalExtension();
        $passportCopy = $user->id.'_passportCopy'.time().'.'.request()->passportCopy->getClientOriginalExtension();
        $inn = $user->id.'_inn'.time().'.'.request()->inn->getClientOriginalExtension();

        if($request->inn2 != null){
            $inn2 = $user->id.'_inn2'.time().'.'.request()->inn2->getClientOriginalExtension();
            $request->inn2->storeAs('inn',$inn2);
            
            $request->image->storeAs('avatars', $imageName);
            $request->passportCopy->storeAs('passportCopies', $passportCopy);
            $request->inn->storeAs('inn',$inn);
            
            $porfile = Profile::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'number' => $request->number,
                'email' => $request->email,
                'image' => $imageName,
                'passportCopy' => $passportCopy,
                'user_id' => $request->user_id,
                'inn' => $inn,
                'inn2' => $inn2,
            ]);
        } else {
            $request->image->storeAs('avatars', $imageName);
            $request->passportCopy->storeAs('passportCopies', $passportCopy);
            $request->inn->storeAs('inn',$inn);
            
            $porfile = Profile::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'number' => $request->number,
                'email' => $request->email,
                'image' => $imageName,
                'passportCopy' => $passportCopy,
                'user_id' => $request->user_id,
                'inn' => $inn,
            ]);
        }

        
        return redirect()
                ->back()
                ->with(['msg' => 'Анкета добавлено успешно!',]);
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'smsFromUser' => 'required',
            'randNumber' => 'required'
        ]);
        $randnumber = $request->randNumber;
        $smsFromNumber = $request->smsFromUser;

        if($randnumber === $smsFromNumber) {

            $user = User::findOrFail(\Auth::user()->id);
            $user->confirmedNumber = "yes";
            $user->save();
            return redirect()
                    ->route('home')
                    ->with([
                        'msg' => 'Принято'
                    ]);
        }
        else {
            return redirect()
                    ->route('home')
                    ->with([
                        'msg' => 'nope'
                    ]);
        }

    }

    public function sendSms()
    {
        $randnumber = rand(1000, 9999);
        $response = Http::withBasicAuth('academy.napa.uz', 'Jsm2*12N@ps8')
        ->post('http://91.204.239.44/broker-api/send', [
            'messages' => [
                'recipient' => auth()->user()->profile->number,
                'message-id' => 'adc00000' .$randnumber,
                'sms' => [
                    'originator' => 3700,
                    'content' => [
                        'text' => $randnumber
                    ]
                ]
            ]
        ]);

        return view('confirmNumber', ['randnumber' => $randnumber]);
    }
    
}
