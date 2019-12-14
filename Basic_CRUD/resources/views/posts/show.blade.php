@extends('laouts.app');

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
            </div>
        </div>
    </div>

@endsection
