@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end my-2">
        <a href="{{route('categories.create')}}" class="btn btn-success">Create Category</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Create Category</div>
        <div class="card-body">

            @include('inc.message')

            <form action="{{route('categories.store')}}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Category Name..." value="{{isset($category)? $category->name:''}}">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
