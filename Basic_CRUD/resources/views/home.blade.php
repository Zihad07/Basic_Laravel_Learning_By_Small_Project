@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a class="btn btn-dark" href="/posts/create" class="">Created Post</a>
                        <h3>Your Blog Posts</h3>
{{--                        {{print_r($posts)}}--}}

                        @if(count($posts) > 0)
                            <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>

                            @foreach($posts as $post)
                                <tr>
                                    <th>{{$post->title}}</th>
                                    <th><a href="/posts/{{$post->id}}/edit" class="btn btn-dark">Edit</a></th>
                                    <th>
                                        {!! Form::open(['route' => ['posts.destroy',$post->id], 'method'=>'DELETE']) !!}
                                        {{Form::submit('Delete',['class'=>"btn btn-danger"])}}
                                        {!! Form::close() !!}
                                    </th>
                                </tr>
                             @endforeach
                        </table>
                        @else
                            <p>You have no posts</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
