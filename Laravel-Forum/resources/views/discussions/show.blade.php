@extends('layouts.app')

@section('content')


<div class="card mb-2">
    @include('inc.discussion-header')

    <div class="card-body">
        <div class="text-center font-weight-bold">
            {{ $discussion->title }}
        </div>
        <hr>

        {!! $discussion->content !!}

        @if ($discussion->bestReply)
            <div class="card bg-primary my-3" style="color:#fff;">
                <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                                <img height="40px" width="40px" style="border-radius:50%;" src="{{ Gravatar::get($discussion->bestReply->owner->email) }}" alt="">
                                <span class="ml-2">{{ $discussion->bestReply->owner->name }}</span>
                        </div>

                        <div>
                                <strong>Best Reply</strong>
                        </div>
                </div>
                <div class="card-body">
                        {!! $discussion->bestReply->content !!}
                </div>
            </div>
        @endif
    </div>
</div>

{{--  Comment or Reply message show  --}}

@foreach ($discussion->replies()->paginate(3) as $reply)
<div class="card my-2">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <img width="40px" height="40px" style="border-radius:50%;"
                    src="{{ Gravatar::get($reply->owner->email) }}" alt="">
                <span class="ml-2">{{ $reply->owner->name }}</span>
            </div>

            <div>
               @if (auth()->user()->id === $discussion->user_id)
                   
               <form action="{{ route('mark.best-reply',['discussion'=>$discussion->slug,'reply'=>$reply->id]) }}" method="post">
                        @csrf
                        <button class="btn btn-success btn-sm">Mark as best Reply</button>
                    </form>
                   
               @endif
            </div>
        </div>


    </div>
    <div class="card-body">
        {!! $reply->content !!}
    </div>
</div>
@endforeach

{{ $discussion->replies()->paginate(3)->links() }}

{{--  Comment or  reply submit form  --}}
<div class="card">
    <div class="card-header">
        Add a Reply
    </div>

    <div class="card-body">
        @auth

        <form action="{{ route('replies.store',$discussion->slug) }}" method="post">
            @csrf
            <input type="hidden" name="content" id="content">
            <trix-editor input="content"></trix-editor>

            <button type="submit" class="my-2 btn btn-sm btn-primary">
                Reply
            </button>
        </form>

        @else
        <a href="{{ route('login') }}" class="btn btn-sm btn-primary">
            Login Before Reply
        </a>
        @endauth

    </div>

</div>



@endsection


@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">

@endsection


@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>

@endsection
