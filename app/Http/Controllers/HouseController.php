<?php

namespace App\Http\Controllers;

use App\House;
use App\access;
use App\device;
use App\room;
use Auth;
use App\User;
use DB;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function createhouse(Request $request){
        $count = device::where('device.houseid', NULL)->where('device.key',$request->input('devicekey'))->count();

        if($count){
            $House = new house;
            $House->name = $request->input('devicekey');
            $House->save();

            $House = house::where('house.name',$request->input('devicekey'))->first();

            $House->name = $request->input('name');
            $House->save();
            
            $Device = device::where('device.houseid', NULL)
            ->where('device.key',$request->input('devicekey'))->first();
            $Device->houseid = $House->id;
            $Device->save();

            $Access = new access;
            $Access->userid = Auth::user()->id;
            $Access->houseid = $House->id;
            $Access->type = 1;
            $Access->save();
        }

        // dd($count);

        return redirect()->back();
    }
    public function createroom(Request $request){
        //room
        $room = new room;
        $room->name = $request->input('roomname');
        $room->houseid = $request->input('houseid');
        $room->save();
        return redirect()->back();
    }
    public function deviceadd(Request $request){
        $count = device::where('device.houseid', NULL)->where('device.key',$request->input('devicekey'))->count();

        if($count){
            //house

            $Device = device::where('device.houseid', NULL)
            ->where('device.key',$request->input('devicekey'))->first();
            $Device->houseid = $request->input('houseid');
            $Device->save();

        }
       return redirect()->back()->with('message', 'success');
    }

    public function showroom($id){
        $room['data'] = DB::table('room')->where('houseid',$id)->get();
        
        echo json_encode($room);
        exit;

    }

}
