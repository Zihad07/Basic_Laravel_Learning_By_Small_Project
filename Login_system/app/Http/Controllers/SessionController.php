<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function accessSessionData(Request $request){
        if($request->session()->has('my_name')){
            echo $request->session()->get('my_name');
        }else{
            echo "No dat in the sesstion";
        }

    }

        

    public function storeSessionData(Request $request){
        $request->session()->put('my_name','Awsime');
        echo "Data has been added to session";
    }

    public function deleteSessionData(Request $request){
        $request->session()->forget('my_name');
        echo "Data has been removed from session";
    }
    
}
