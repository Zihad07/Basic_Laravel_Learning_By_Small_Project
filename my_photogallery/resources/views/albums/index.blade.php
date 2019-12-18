@extends('layouts.app')

@section('content')
    @if(count($albums) > 0)
        @php
             $i = 1;
        @endphp
        <div id="albums">
            <div class="row mt-4 text-center">
                @foreach($albums as $album)
                    <div class='col-md-4 col-sm-4 columns'>
                        <a href="/albums/{{$album->id}}">
                            <img class="img-thumbnail" src="/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
                        </a>
                        <br>
                        <h4>{{$album->name}}</h4>


                        @if($i % 3 == 0)
                        </div></div><div class="row my-2 text-center">
                        @else
                            </div>
                        @endif

                        @php
                            $i++;
                        @endphp
                @endforeach
            </div>
        </div>
    @else
        <p>No Albums To Display</p>
    @endif

@endsection
