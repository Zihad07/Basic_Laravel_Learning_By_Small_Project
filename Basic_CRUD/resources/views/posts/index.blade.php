
@extends('layouts.app')

@section('content')

    <h1 class="">Posts</h1>

    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="card card-body my-2">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
            </div>

        @endforeach
        {{$posts->links()}}
    @else
        <P>No Posts Found</P>
    @endif


@endsection
