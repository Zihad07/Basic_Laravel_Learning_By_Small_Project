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

use App\Role;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create',function(){
    $user = User::findOrFail(1);
    $user->roles()->save(new Role(['name'=>'Administrator']));
});

Route::get('/read',function(){
    $user = User::findOrFail(2);
    $roles = $user->roles;

    // dd($roles);

    foreach($roles as $role){
        echo $role->name.'<br>';
    }
});


Route::get('/update',function(){
    $user = User::findOrFail(1);
    
    if($user->has('roles')){
        foreach($user->roles as $role){
            if($role->name == 'Administrator'){
                $role->name = 'subscriver';
                $role->save();
            }
        }
    }
});

Route::get('/delete',function(){
    $user = User::findOrFail(1);
    
    if($user->has('roles')){
        foreach($user->roles as $role){
            $role->whereId(4)->delete();
        }
    }
});
