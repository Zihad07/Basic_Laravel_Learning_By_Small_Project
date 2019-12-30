@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end my-2">
        <a href="{{route('tags.create')}}" class="btn btn-success">Create tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header">tags</div>
        <div class="card-body">
           @if($tags->count()>0)
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Post Count</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>

                            <td>{{$tag->name}}</td>
                            <td>
                                {{ $tag->posts->count() }}
                                
                            </td>
                            <td>
                                <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-dark btn-sm ">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})">Delete</button>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="" method="POST" id="deletetagForm">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete tag</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center text-bold">
                                        Are You want to delete tag?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No Go-Back</button>
                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
           @else
            <h3 class="text-center">Not tags Yet</h3>
           @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
        function handleDelete(id) {
            // console.log('hello',id);
            var form = document.getElementById('deletetagForm');
            form.action = '/tags/' + id;
            // console.log(form);
            $('#deleteModal').modal('show');

        }
    </script>
    @endsection
