
@extends('laouts.app');

@section('content');

<div class="jumbotron text-center mt-4">
    <h1 class="display-3">Welcome to Laravel</h1>
    <p class="lead">Jumbo helper text</p>
    <hr class="my-2">
    <p>More info</p>
    <p class="lead">
        <a class="btn btn-primary " href="/login" role="button">Login</a>
        <a class="btn btn-success " href="/register" role="button">Register</a>
    </p>
</div>
@endsection
