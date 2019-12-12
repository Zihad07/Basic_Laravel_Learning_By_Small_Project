<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $title = "Welcome to laravel Course";
        return view('pages.index',compact('title'));
    }

    public function  about(){
        $title = "Welcome to laravel Course";
        return view('pages.about');
    }

    public function  services(){
        $title = "Welcome to laravel Course";

        $info = [
            'name'=> 'nahid',
            'email'=> 'nahid@gmail.com',
            'services'=> ['SEO','Fontend','Backend']
        ];
        return view('pages.services',compact('info'));
//        return view('pages.services')->with($info);
    }
}
