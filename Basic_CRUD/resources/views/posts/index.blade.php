
@extends('layouts.app')

@section('content')

    <h1 class="">Posts</h1>

    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="row border p-4 mb-4">
                <div class="col-md-4 col-sm-4">
                    <img src="/image/{{$post->cover_image}}" alt="" class="img-fluid">
                </div>

                <div class="col-md-8 col-sm-8">
                    <div class="card card-body my-2">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
            </div>

        @endforeach
        {{$posts->links()}}
    @else
        <P>No Posts Found</P>
    @endif


@endsection
