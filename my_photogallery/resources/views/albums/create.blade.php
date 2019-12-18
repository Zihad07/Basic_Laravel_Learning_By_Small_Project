
@extends('layouts.app')

@section('content')
    <h1>Create Album</h1>
    <div class="row my-4">

        <div class="col-md-8 col-sm-8 mx-auto">
            {!! Form::open(['action' =>'AlbumsController@store','method'=>'POST', 'files'=>true]) !!}
            <div class="form-group">
                {{Form::text('name','', ['class'=>'form-control','placeholder'=>'Album Name'])}}
            </div>

            <div class="form-group">
                {{Form::textarea('description','', ['class'=>'form-control','placeholder'=>'Album Description'])}}
            </div>

            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>

            {{Form::submit('submit',['class'=>'btn btn-primary btn-md'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
