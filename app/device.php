<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class device extends Model
{
    //Table name
    protected $table = 'device';
    //Primary key
    public $primarykey = ['id','key'];
    //timestamps
    public $timestamps = true;

    public function access(){
        return $this->hasMany('App\access');
    }
    public function housed(){
        return $this->hasMany('App\device');
    }
}
