<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
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
    public function index()
    {
        return view('/device');
    }
}
