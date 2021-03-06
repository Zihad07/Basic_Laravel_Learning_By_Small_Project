@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header">Create New Discusstion </div>

    <div class="card-body">
       <form action="{{ route('discussions.store') }}" method="post">
           @csrf
           <div class="form-group">
               <label for="title">Title</label>
               <input id="title" class="form-control" type="text" name="title">
           </div>
           <div class="form-group">
               <label for="content">Content</label>
               <input id="content" type="hidden" name="content">
               <trix-editor input="content"></trix-editor>
               {{--  <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>  --}}
           </div>

           <div class="form-group">
               <select name="channel" id="channel" class="form-control">
                   @foreach ($channels as $channel )
                       <option value="{{ $channel->id }}">
                           {{ $channel->name }}
                       </option>
                   @endforeach
               </select>
           </div>

           <div class="form-group">
               <button type="submit" class="btn btn-sm btn-success">Create Discussion </button>
           </div>
       </form>
    </div>
</div>
@endsection


@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    
@endsection


@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    
@endsection