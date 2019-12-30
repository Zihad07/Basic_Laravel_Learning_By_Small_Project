<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('users.index')->with('users',User::all());
    }

    public function makeAdmin(User $user)
    {
        $user->role= 'admin';

        session()->flash('success','User make admin successfully.');
        $user->save();
        
        return redirect(route('users.index'));
    }
}
