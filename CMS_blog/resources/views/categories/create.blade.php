@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end my-2">
        <a href="{{route('categories.create')}}" class="btn btn-success">Create Category</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            {{isset($category) ? 'Edit Category':'Create Category'}}
        </div>
        <div class="card-body">

            @include('inc.message')

            <form action="{{isset($category)?route('categories.update',$category->id):route('categories.store')}}" method="POST">

                @if(isset($category))
                    @method('PUT')
                @endif

                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Category Name..." value="{{isset($category)?$category->name:''}}">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary">
                        {{isset($category) ?'Update Category':'Add Category'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
