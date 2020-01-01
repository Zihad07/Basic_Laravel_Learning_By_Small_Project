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

use App\Http\Controllers\Blog\PostsController;

// Fontend ui
Route::get('/', 'WelcomeController@index')->name('welcome');


Route::get('blog/posts/{post}', 'PostController@show')->name('blog-show');


// Fontend ui


Auth::routes();



// Route group
Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories','CategoriesController');

    Route::resource('tags','TagsController');

    Route::resource('posts','PostsController');

    Route::get('trashed-posts','PostsController@trashed')->name('trashed-posts.index');

    Route::put('restore-post/{post}','PostsController@postRestore')->name('undo-post');

});


Route::middleware(['auth','verifiIsAdmin'])->group(function(){
    Route::get('users/profile','UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile','UsersController@update')->name('users.update-profile');
    Route::get('users','UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin','UsersController@makeAdmin')->name('users.make-admin');

});