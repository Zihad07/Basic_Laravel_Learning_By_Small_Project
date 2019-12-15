
@extends('layouts.app')

@section('content')

    <h1 class="display-6">Posts Create</h1>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card card-body">
                {!! Form::open(['route' => 'posts.store', 'files'=>true,'method'=>'POST']) !!}
                    <div class="form-group">
                        {{Form::label('title','Title: ')}}
                        {{Form::text('title','', ['class'=>'form-control','placeholder'=>'Title'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('body','Detils: ')}}
                        {{Form::textarea('body','', ['style'=>'height:100;','id'=>'editor','class'=>'form-control','placeholder'=>'Test....'])}}
                    </div>

                    <div class="form-group">
                        {{Form::file('cover_image')}}
                    </div>
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
