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
        $devices = device::all();
        $house = house::all();
        return view('/dashboard', compact($devices,));
    }
}
