@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end my-2">
        <a href="{{route('categories.create')}}" class="btn btn-success">Create Category</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>

                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-dark btn-sm ">Edit</a>
                    </td>

                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
