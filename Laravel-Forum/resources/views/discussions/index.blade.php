@extends('layouts.app')

@section('content')

@foreach ($discussions as $discussion)
<div class="card mb-2">
   @include('inc.discussion-header')

    <div class="card-body text-center font-weight-bold">
            {{ $discussion->title }}
    </div>
</div>
@endforeach

{{ $discussions->links() }}

@endsection
