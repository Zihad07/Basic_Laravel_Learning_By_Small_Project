@extends('app.layouts')

@section('content')
    <h2>All contact list</h2>
    <ul class="list-group">
            @foreach($allinfo as $info)
            <li class="list-group-item">Name:{{$info->name}} </li>
            <li class="list-group-item disabled">Email:{{$info->email}}</li>
            <hr class="my-2">
            @endforeach


    </ul>
@endsection
