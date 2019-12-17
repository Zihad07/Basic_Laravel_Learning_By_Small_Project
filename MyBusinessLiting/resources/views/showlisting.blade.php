@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$listing->name}} <a href="/listings" class="float-right btn btn-md btn-dark">Go Back</a></div>

                <div class="card-body">

                    <ul class="list-group">
                        <li class="list-group-item">Address: {{$listing->address??'None'}}</li>
                        <li class="list-group-item">Website: {{$listing->wesbite??'None'}}</li>
                        <li class="list-group-item">Email: {{$listing->email}}</li>
                        <li class="list-group-item">Phone: {{$listing->phone??'None'}}</li>
                    </ul>

                    <hr>
                    <div class="p-4" style="background: lightgray">
                        {{$listing->bio??'None'}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
