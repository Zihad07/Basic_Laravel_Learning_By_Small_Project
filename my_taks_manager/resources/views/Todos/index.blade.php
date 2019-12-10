
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
                                    @if (!$todo->completed)
                                        <a href="/todos/{{ $todo->id }}/complete" style="color:white;" class="btn btn-warning btn-sm mr-2 float-right">Complete</a>
                                    @elseif($todo->completed)
                                        <a href="/todos/{{ $todo->id }}/undo" style="" class="btn btn-info btn-sm mr-2 float-right">Uncompleted</a>
                                    @endif 
                                   
                                    {{-- <a href="{{ route('mytasks',[$todo->id]) }}" class="btn btn-primary btn-sm float-right">View</a>  --}}
                                
                                </li> 
                                   
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
    </div>
@endsection