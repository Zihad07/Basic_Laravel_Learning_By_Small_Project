<div class="card-header">
        {{--  {{ $discussion->title }}  --}}
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <img width="40px" height="40px" style="border-radius:50%;"  src="{{ Gravatar::get($discussion->user->email) }}" alt="">

                <strong class="ml-2">{{ $discussion->user->name }}</strong>
            </div>

            <div>
                    <a href="{{ route('discussions.show',$discussion->slug) }}" class="btn btn-sm btn-success">View</a>
            </div>
        </div>

        
    
    </div>