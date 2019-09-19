<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
        //Table name
        protected $table = 'house';
        //Primary key
        public $primarykey = 'id';
        //timestamps
        public $timestamps = true;

        public function accesshouse(){
        return $this->hasMany('App\access');
        }
       
}
