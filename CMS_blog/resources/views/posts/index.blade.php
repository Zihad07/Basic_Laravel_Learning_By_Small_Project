@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create')}}" class="btn btn-success">Add Posts</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">
            @if($posts->count()>0)
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>

                    </tr>

                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>

                            <td>
                                <img src="{{asset('storage/'.$post->image)}}" width="100px" height="100px" alt="">
                            </td>
                            <td>{{$post->title}}</td>

                            <td>
                                <a href="{{ route('categories.edit',$post->category->id) }}">
                                    {{ $post->category->name }}
                                </a>
                            </td>


                            @if($post->trashed())
                                <td>
                                        
                                    <form action="{{ route('undo-post',$post->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-success">Restore</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-sm btn-dark">Edit</a>
                                </td>
                            @endif

                            <td>
                                <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        {{$post->trashed() ? 'Delete':'Trash'}}
                                    </button>
                                </form>
                            </td>


                        </tr>
                    @endforeach

                    </tbody>
                </table>
             @else
                <h3 class="text-center">Not Post Yet</h3>
            @endif
        </div>
    </div>
    @endsection
