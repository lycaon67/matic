<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(Request $request)
    {
        //$usertype = $request->session()->get('type');

        // if($user){
        //     return Redirect::back();
        // }
    }

    public function index()
    {
        return view('/home');
    }
}
