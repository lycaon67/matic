<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class access extends Model
{
    //Table name
    protected $table = 'access';
    //Primary key
    public $primarykey = ['userid','houseid'];
    //timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function device(){
        return $this->belongsTo('App\House');
    }
}
