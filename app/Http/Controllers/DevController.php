<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\device;
use App\House;
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

    public function create(Request $request)
    {
        $device = new device;
        $device->key = $request->input('devicekey');
        $device->keypass = $request->input('keypass');
        $device->type = $request->input('type');
        $device->save();

        return redirect()->back();
    }

    public function index()
    {
// <<<<<<< HEAD
        $devices = device::all();
        $house = house::all();
        return view('/dashboard')->with('devices',$devices);
// =======
// <<<<<<< HEAD
        // return view('/dashboard');
// =======
//         $device = device::all();

//         return view('/dashboard')->with('devices', $device);
// >>>>>>> 088beae0a9cdf46b98da6c746c482c6a5cd1acb1
// >>>>>>> d5849b5c0251aea8e2ecbf1ede37e91d439c21da
    }
}
