<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    
// Route::get('devicechannel',[
//     'uses' => 'DevController@index',
//     'as' => 'device.index'
// ]);


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::post('device/add',[
    'uses' => 'HouseController@deviceadd',
    'as' => 'device.add'
]);

Route::post('house/test',[
    'uses' => 'HouseController@test',
    'as' => 'house.test'
]);

Route::post('house/create',[
    'uses' => 'HouseController@createhouse',
    'as' => 'house.create'
]);

Route::post('room/create',[
    'uses' => 'HouseController@createroom',
    'as' => 'room.create'
]);

Route::post('login/custom',[
    'uses' => 'LoginController@login',
    'as' => 'login.custom'
]);

Route::get('room/show/{id}',[
    'uses' => 'HouseController@showroom',
    'as' => 'show.room'
]);




Route::get('/', function () {
    return view('welcome');
});
// Route::get('/channel', 'DevController@index')->name('channel');


Route::group(['middleware' => 'auth'], function(){

    Route::prefix('home',['middleware' => 'is_customer'])->group(function(){
        Route::get('/', 'HomeController@index')
//        ->middleware('is_customer')    
        ->name('home');
    
    });

    Route::group(['middleware' => 'is_admin'], function(){
        Route::get('/dashboard', 'DevController@index')
//        ->middleware('is_customer')    
        ->name('dashboard');
    
    });
    // Route::get('/dashboard', 'DevController@index')    
    // ->middleware('is_admin')    
    // ->name('dashboard');

    // Route::get('/home', 'UserController@index')->name('home');
    
    // Route::get('/dashboard', 'DevController@index')->name('dashboard');

});