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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/home/{id?}',function ($id=null){
//
//    if($id){
//        return 'This home id: '.$id;
//    }
//    return 'This is home...:)';
//
//});


Route::get('/home','SiteController@home');
Route::get('/home/contact','SiteController@contact');
Route::post('/send','SiteController@send');
Route::get('/home/show','SiteController@index');
