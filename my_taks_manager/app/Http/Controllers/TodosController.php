<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    //

    public function index(){

        // Fetch all data from data base
        $todos = Todo::all();

        // Send all data to view
        return view('Todos.index', compact('todos'));
    }

    public function show($todoId){
        
        $todo = Todo::findOrFail($todoId);
        return view('Todos.show', compact('todo'));
    }

    public function create(){
        return view('Todos.create');
    }
    public function store(Request $request){
        // dd($request);
        // dd($request->all());

        // Validation
        $this->validate($request,[
            'name' => 'required|min:4|max:20|',
            'description' => 'required'
        ]);

        // Then save data all

        $todo = $request->all();
        $todo['completed'] = false;

        // save the data into todos database

        Todo::create($todo);

        return redirect('/mytasks');
    }
}
