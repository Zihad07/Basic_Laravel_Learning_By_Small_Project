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

use App\Address;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert',function(){
    $user = User::findOrFail(2);

    $address = new Address(['name'=>'9900 NK BD.']);

    $user->address()->save($address);
});


Route::get('/update',function(){
    $address = Address::whereUserId(2)->first();

    $address->name = '5657 udated version address';
    $address->save();

});

Route::get('/read',function(){
    $user = User::findOrFail(2);

    $address = $user->address->name;
    return $user->name.' address is '.$address;
});

Route::get('/delete',function(){
    $user = User::findOrFail(2);

    $user->address()->delete();
    // $user->address()->first()->delete();
    return $user->name.'Address Delete';
});

