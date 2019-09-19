<?php

namespace App\Http\Controllers;

use App\House;
use App\access;
use App\device;
use Auth;
use App\User;
use Illuminate\Http\Request;
use DB;

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
        $user_id = Auth::user()->id;
        $houses = DB::table('users')
                ->join('access', 'access.userid', '=', 'users.id')
                ->join('house', 'house.id', '=', 'access.houseid')
                ->where('users.id', '=', $user_id)  
                ->get();
        
        $rooms = DB::table('room')
                ->get();
        
        $House = DB::table('house')
        ->get();
        

        return view('/home')->with('houses', $houses)->with('rooms', $rooms);
    }
}
