
@extends('layouts.app')

@section('title','Todo-list')
    

@section('content')
     <div class="row my-4 justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        todos
                    </div>
                    <div class="card-body">
                        {{-- <h5 class="card-title">Title</h5> --}}
                        <ul class='list-group'>

                            @foreach ($todos as $todo )
                                <li class="list-group-item">
                                    {{ $todo->name }}
                                    <a href="mytasks/{{ $todo->id }}" class="btn btn-primary btn-sm float-right">View</a> 
                                    {{-- <a href="{{ route('mytasks',[$todo->id]) }}" class="btn btn-primary btn-sm float-right">View</a>  --}}
                                
                                </li> 
                                   
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
    </div>
@endsection