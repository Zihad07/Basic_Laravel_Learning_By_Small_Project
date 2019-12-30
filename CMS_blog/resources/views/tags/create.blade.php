@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end my-2">
        <a href="{{route('tags.create')}}" class="btn btn-success">Create tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            {{isset($tag) ? 'Edit tag':'Create tag'}}
        </div>
        <div class="card-body">

            @include('inc.message')

            <form action="{{isset($tag)?route('tags.update',$tag->id):route('tags.store')}}" method="POST">

                @if(isset($tag))
                    @method('PUT')
                @endif

                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="tag Name..." value="{{isset($tag)?$tag->name:''}}">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary">
                        {{isset($tag) ?'Update tag':'Add tag'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
