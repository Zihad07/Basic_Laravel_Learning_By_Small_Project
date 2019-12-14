@extends('layouts.app');

@section('content')
    <a href="/posts" class="btn btn-dark">Go Back</a>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card text-left">


                <div class="card-body">
                    <h4 class="card-title">{{$post->title}}</h4>
                    <p class="card-text">{!!$post->body!!}</p>
                    <hr class="my-1">
                    <strong><small>Written on : {{$post->created_at}}</small></strong>

                </div>

                @if(!Auth::guest())
                    @if(Auth::user()->id == $post->user_id)
                    <div class="card-footer">
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-dark">Edit</a>

    {{--                    <a href="/posts/{{$post->id}}/edit" class="btn btn-danger float-right">Delete</a>--}}
                        {!! Form::open(['route' => ['posts.destroy',$post->id], 'method'=>'DELETE']) !!}
                            {{Form::submit('Delete',['class'=>"btn btn-danger float-right"])}}
                        {!! Form::close() !!}
                    </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

@endsection
