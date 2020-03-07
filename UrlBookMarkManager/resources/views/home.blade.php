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
                        @include('inc.message')
                        <br>
                        <button class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#addModal">
                            Add Bookmark
                        </button>

                        <hr>
                        <h3>{{auth()->user()->name}}'s BookMark</h3>
                        <ul class="list-group mb-2">
                            @foreach($bookmarks as $bookmark)
                                <li class="list-group-item">
                                   <div class="d-flex align-items-center justify-content-between">
                                       <div>
                                           <a href="{{$bookmark->url}}" target="_blank">{{$bookmark->name}}</a>
                                           <span class="label">{{$bookmark->description ?? ''}}</span>
                                       </div>

                                       <span>
{{--                                           <button class="btn btn-outline-danger btn-sm">Delete</button>--}}
                                                <example-component userid="{{$bookmark->id}}"></example-component>
                                       </span>
                                   </div>
                                </li>
                            @endforeach
                        </ul>
                        {{$bookmarks->links()}}


                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Bookmark</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('bookmark.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Bookmark Name</label>
                        <input type="text" name="name" id=""class="form-control" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Bookmark URL</label>
                        <input type="text" name="url" id=""class="form-control" value="{{old('url')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{old('description')}}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
