@extends('layouts.app')

@section('content')
    <h1>{{$album->name}}</h1>
    <a href="/" class="btn btn-secondary">Go Back</a>
    <a href="/photos/create/{{$album->id}}" class="btn btn-primary">Upload Photo To Album</a>
    <hr>
@endsection
