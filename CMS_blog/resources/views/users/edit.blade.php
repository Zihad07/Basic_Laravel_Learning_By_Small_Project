@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header"><strong>My Profile</strong></div>

    <div class="card-body">
        @include('inc.message')

        <form action="{{ route('users.update-profile') }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="about">About</label>
                <textarea id="about" class="form-control" name="about" rows="3">{{ $user->about }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
</div>
@endsection
