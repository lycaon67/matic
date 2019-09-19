<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
     //Table name
     protected $table = 'room';
     //Primary key
     public $primarykey = ['id','houseid'];


    public function room(){
        return belongsTo('App\room');
    }
}
