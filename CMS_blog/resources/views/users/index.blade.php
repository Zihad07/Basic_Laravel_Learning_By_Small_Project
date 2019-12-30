@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create')}}" class="btn btn-success">Add Posts</a>
    </div>

    <div class="card card-default">
        <div class="card-header">All User</div>
        <div class="card-body">
            @if($users->count()>0)
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>

                    </tr>

                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>

                            <td>
                                <img src="{{ Gravatar::src('thomaswelton@me.com') }}" width="100px" alt="">
                            </td>
                            <td>{{$user->name}}</td>

                            <td>
                                {{ $user->email }}
                            </td>

                            <td>
                                @if (!$user->isAdmin())
                                    <form action="{{ route('users.make-admin',$user->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-success" type="submit">
                                                Make Admin
                                        </button>
                                    </form>
                                @endif
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
