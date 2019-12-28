@extends('app.layouts')

@section('content')
    <h1>Touch with</h1>

    <form action="{{url('/send')}}" method="POST">
        @csrf

        <div class="form-group">
            <input type="text"
                   class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <input type="text"
                   class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Enter your email..">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
    @endsection
