<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('type')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('house', function (Blueprint $table){
            $table->increments('id')->unique();
            $table->string('name');
            $table->timestamps(); 
        });

        Schema::create('access', function (Blueprint $table){
            $table->integer('userid')->unsigned();
            $table->integer('houseid')->unsigned();
            $table->boolean('type');
            $table->timestamps();
            $table->primary(['userid', 'houseid']);
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('houseid')->references('id')->on('house');
        });

        Schema::create('device', function (Blueprint $table){
            $table->increments('id');
            $table->string('key')->unique();
            $table->integer('houseid')->unsigned();
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->foreign('houseid')->references('id')->on('house');
        });

        Schema::create('room', function (Blueprint $table){
            $table->integer('id')->unsigned()->autoIncrement();
            $table->integer('houseid')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('channel', function (Blueprint $table){
            $table->integer('id')->unsigned();
            $table->integer('deviceid')->unsigned();
            $table->integer('roomid')->unsigned()->index();
            $table->string('name');
            $table->boolean('status')->default(0);
            $table->primary(['id', 'deviceid']);    
            $table->foreign('deviceid')->references('id')->on('device');
            $table->foreign('roomid')->references('id')->on('room');
        });

        Schema::table('room', function (Blueprint $table){
            $table->foreign('houseid')->reference('id')->on('house');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
