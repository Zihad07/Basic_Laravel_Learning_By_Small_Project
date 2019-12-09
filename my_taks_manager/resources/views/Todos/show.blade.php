
@extends('layouts.app')

@section('title',$todo->name)

@section('content')
      <h2 class="text-center my-2">{{ $todo->name }}</h2>
        <div class="row my-4 justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        Todo-Details
                    </div>
                    <div class="card-body">
                        {{-- <h5 class="card-title">Title</h5> --}}
                       {{ $todo->description }}
                    </div>
                </div>
            </div>
        </div>
@endsection