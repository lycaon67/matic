<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\device;
use Illuminate\Http\Request;

class DevController extends Controller
{
    // public function __construct()
    // {
    //     //Auth::user()->firstname;

    //     // if(!$user){
    //     //     return Redirect::back();
    // // }
    // }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $device = new device;
        $device->key = $request->input('devicekey');
        $device->keypass = $request->input('keypass');
        $device->key = $request->input('devicekey');
        $device->save();

        return Redirect::back();
    }

    public function index()
    {
<<<<<<< HEAD
        return view('/dashboard');
=======
        $device = device::all();

        return view('/dashboard')->with('devices', $device);
>>>>>>> 088beae0a9cdf46b98da6c746c482c6a5cd1acb1
    }
}
