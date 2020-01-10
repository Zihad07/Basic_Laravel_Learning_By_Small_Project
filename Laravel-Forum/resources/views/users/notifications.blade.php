@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        

    <ul class="list-group">
        @foreach ($notifications as $notification)
           <li class="list-group-item">
               {{--  {{ $notification->type }}  --}}
               @if ($notification->type==='App\Notifications\NewReplyAdded')

                A new Discussion Reply added.
                 <strong>{{$notification->data['discussion']['title']}}</strong>
                
                <a href="{{route('discussions.show',$notification->data['discussion']['slug'])}}" class="btn btn-sm btn-dark float-right">
                    View Discussion
                </a>
               @endif

               {{--  App\Notifications\ReplyMarkedAsBestReply  --}}
                {{--  {{ $notification->type }}  --}}

                @if($notification->type === 'App\Notifications\ReplyMarkedAsBestReply')
                    Your reply to the discussion <strong>{{$notification->data['discussion']['title']}}</strong>
                     was marked as Best Reply.

                     <a href="{{route('discussions.show',$notification->data['discussion']['slug'])}}" class="btn btn-sm btn-success float-right">
                        View Discussion
                    </a>
                @endif
        @endforeach
    </ul>
    </div>
</div>
@endsection
