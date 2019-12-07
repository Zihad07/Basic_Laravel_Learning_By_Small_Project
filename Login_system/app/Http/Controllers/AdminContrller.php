<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminContrller extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index(Request $request){

        // $request->session()->put(['ad'=>'mykey','am'=>'you key']);
        // echo session()->get('ad');

        // $request->session()->forget('ad');
         $request->session()->flash();
        
        
        // return $request->session()->all();

        // return "Your are admin";
    }
}
