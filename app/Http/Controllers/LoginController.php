<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    
    public function login(Request $request)
    {   
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            $user = User::where('email', $request->email)->first();

            if($user->is_admin())
            {
                return redirect()->route('dashboard');
            }else{
                
                return redirect()->route('home');
            }
        }
        return redirect()->back();
    }

    public function customer(Request $request){
        $user = Auth::user()->type;

        if($user)
        {   
            return view('/dashboard');
        }else{

            // $houses = house::all();

            // return redirect('/home')->with('house', $houses);
            // return view('/home');
        $houses = house::all();
        // return redirect('/home')->with('houses', $houses);
        return view('/home')->with('houses', 'mansion');
        }
        
    }
}
