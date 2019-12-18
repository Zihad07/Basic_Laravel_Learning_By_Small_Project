
@extends('layouts.app')

@section('content')
    <h1>Upload Photo</h1>
    <div class="row my-4">

        <div class="col-md-8 col-sm-8 mx-auto">
            {!! Form::open(['action' =>'PhotosController@store','method'=>'POST', 'files'=>true]) !!}
            <div class="form-group">
                {{Form::text('title','', ['class'=>'form-control','placeholder'=>'Photo Title'])}}
            </div>

            <div class="form-group">
                {{Form::textarea('description','', ['class'=>'form-control','placeholder'=>'Photo Description'])}}
            </div>

            {{Form::hidden('album_id',$album_id)}}

            <div class="form-group">
                {{Form::file('photo')}}
            </div>

            {{Form::submit('Upload',['class'=>'btn btn-info btn-md'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
