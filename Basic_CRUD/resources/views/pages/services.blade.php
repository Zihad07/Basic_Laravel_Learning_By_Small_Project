
@extends('layouts.app');

@section('content');
<h1>Welcome To Services</h1>
    <pre>
        {{print_r($data)}}
    </pre>

    <li>{{$data['title']}}</li>

    @if(count($data['services'])>0)
        <ul>
            @foreach($data['services'] as $service)
                <li>{{$service}}</li>
            @endforeach
        </ul>
    @endif
@endsection
