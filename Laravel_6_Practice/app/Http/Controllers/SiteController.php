<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('show')->with('allinfo',Contact::all());
//        return response()->json(Contact::all());
    }
    //
    public function home(){
        return view('home');
    }

    public function contact(){
        return view('contact');
    }

    public function send(Request $request){
//        if($request->has('email')){
//            return $request->input('email');
//        }
//        return $request->all();

//        Validate
        $this->validate($request,[
            'name'=>'required|min:4',
            'email'=>'required|email',
        ]);
//        $info = $request->all();
        $contact = new Contact();

        $contact->name = $request->input('name');
        $contact->email = $request->input('email');

        $contact->save();

//        return view('show',compact('info'));
//
//        Flash message
//        return redirect()->back()->with('success','Success Contact Save :) ');
        session('success','Successfully Contact save');
        return view('show')->with('allinfo',Contact::all());
    }
}
