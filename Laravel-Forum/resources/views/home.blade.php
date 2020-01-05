@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end my-2">
    <a href="{{ route('discussions.create') }}" class="btn btn-primary">Add discussion</a>
</div>
<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
</div>
@endsection
