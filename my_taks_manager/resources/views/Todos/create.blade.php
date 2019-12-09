
@extends('layouts.app')

@section('title','Create-Todo')
    

@section('content')
     <div class="row my-4 justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        Create new todo
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger text-danger" role="alert">
                                <ul class="list-group">
                                    @foreach ($errors->all() as $error )
                                        <li class="list-group-item">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                        @endif
                       <form method="POST" action="/store-todos">
                            @csrf
                            <div class="form-group">
                                <input id="my-input" class="form-control" type="text" name="name" placeholder="Enter your todo title..." value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <textarea id="my-textarea" class="form-control" name="description" rows="3" placeholder="Give Details of todo.." >{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group text-right">
                                <input id="my-input" class="btn btn-sm btn-success" type="submit" name="" value="Create">
                            </div>
                            
                       </form>
                    </div>
                </div>
            </div>
    </div>
@endsection