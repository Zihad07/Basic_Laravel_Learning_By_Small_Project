
@extends('layouts.app')

@section('title',$todo->name)

@section('content')
      <h2 class="text-center my-2">{{ $todo->name }}</h2>
        <div class="row my-4 justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <strong>Todo-Details</strong>
                    </div>
                    <div class="card-body">
                        {{-- <h5 class="card-title">Title</h5> --}}
                       {{ $todo->description }}
                    </div>

                    <div class="card-footer">
                        <a href="/todos/{{ $todo->id }}/edit" class="  btn btn-info btn-sm">Edit</a>
                        <a href="/todos/{{ $todo->id }}/delete" class="  btn btn-danger btn-sm  float-right">Delete</a>
                    </div>
                </div>
            </div>
        </div>
@endsection