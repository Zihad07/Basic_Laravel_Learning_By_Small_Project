
@extends('layouts.app')

@section('content')

    <h1 class="display-6">Posts Update</h1>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card card-body">
                {!! Form::open(['route' => ['posts.update',$post->id],'files'=>true, 'method'=>'PUT']) !!}
                    <div class="form-group">
                        {{Form::label('title','Title: ')}}
                        {{Form::text('title',$post->title, ['class'=>'form-control','placeholder'=>'Title'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('body','Detils: ')}}
                        {{Form::textarea('body',$post->body, ['style'=>'height:100;','id'=>'editor','class'=>'form-control','placeholder'=>'Test....'])}}
                    </div>

                    <div class="form-group">
                        {{Form::file('cover_image')}}
                    </div>

                {{Form::submit('Update',['class'=>'btn btn-success'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
