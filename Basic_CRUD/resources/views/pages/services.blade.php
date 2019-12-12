
@extends('laouts.app');

@section('content');
<h1>Welcome To Services</h1>
    <pre>
        {{print_r($info)}}
    </pre>

    <li>{{$info['name']}}</li>

    @if(count($info['services'])>0)
        <ul>
            @foreach($info['services'] as $service)
                <li>{{$service}}</li>
            @endforeach
        </ul>
    @endif
@endsection
