@extends('layouts.app')

@section('content')
    <h1>{{$album->name}}</h1>
    <a href="/" class="btn btn-secondary">Go Back</a>
    <a href="/photos/create/{{$album->id}}" class="btn btn-primary">Upload Photo To Album</a>
    <hr>

    @if(count($album->photos) > 0)
        @php
            $i = 1;
        @endphp
        <div id="albums">
            <div class="row mt-4 text-center">
                @foreach($album->photos as $photo)
                    <div class='col-md-4 col-sm-4 columns'>
                        <a href="/photos/{{$photo->id}}">
                            <img class="img-thumbnail" src="/album_photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                        </a>
                        <br>
                        <h4>{{$photo->title}}</h4>


                        @if($i % 3 == 0)
                    </div></div><div class="row my-2 text-center">
                @else
            </div>
            @endif

            @php
                $i++
            @endphp
            @endforeach
        </div>
        </div>
    @else
        <p>No Photos To Display</p>
    @endif
@endsection
