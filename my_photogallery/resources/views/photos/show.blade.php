@extends('layouts.app')

@section('content')
    <h3>{{$photo->title}}</h3>
    <p>{{$photo->description}}</p>
    <a class="btn btn-dark my-2" href="/album_photo/{{$photo->album_id}}">Back To Gallery</a>
    <hr>

    <img src="/album_photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
    <br><br>

    {!! Form::open(['action'=>['PhotosController@destroy',$photo->id],'method'=>'POST']) !!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete Photo',['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
    @endsection


