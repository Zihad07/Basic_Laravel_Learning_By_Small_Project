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

    // public function show($todoId){

    //     $todo = Todo::findOrFail($todoId);
    //     return view('Todos.show', compact('todo'));
    // }

    // Use Route modeling binding

    public function show(Todo $todo){

        // $todo = Todo::findOrFail($todoId);
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

        // session
        session()->flash('success','New todo successfully created.');

        return redirect('/mytasks');
    }

    // public function edit($todoId){
    //     // return $todoId;
    //     $todo = Todo::findOrFail($todoId);
    //     return view('Todos.edit',compact('todo'));
    // }

    // Use Route model binding
    public function edit(Todo $todo){
        // return $todoId;
        // $todo = Todo::findOrFail($todoId);
        return view('Todos.edit',compact('todo'));
    }


    public function update(Request $request, $todoId){

        $this->validate($request,[
            'name' => 'required|min:4|max:30|',
            'description' => 'required'
        ]);

        $todo = $request->all();
        $data = Todo::findOrFail($todoId);

        $data->update($todo);

        session()->flash('success','Todo updated successfully.');

        return redirect('/mytasks');


    }

    // public function destroy($todoId){
    //     Todo::findOrFail($todoId)->delete();
    //     return redirect('/mytasks');
    // }

    // using route binding
    public function destroy(Todo $todo){
        // Todo::findOrFail($todoId)->delete();
        $todo->delete();
        session()->flash('success','Todo Deleted successfully.');
        return redirect('/mytasks');
    }

    public function complete(Todo $todo){
        $todo->completed = true;
        $todo->save();

        session()->flash('success','Todo completed successfully');
        return redirect('/mytasks');
    }

    public function undo(Todo $todo){
        $todo->completed = false;
        $todo->save();

        // dd($todo);

        session()->flash('success','Todo uncompleted successfully');
        return redirect('/mytasks');
    }









}
