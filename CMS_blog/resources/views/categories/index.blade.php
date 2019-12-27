@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end my-2">
        <a href="{{route('categories.create')}}" class="btn btn-success">Create Category</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Categories</div>
        <div class="card-body">
           @if($categories->count()>0)
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>

                            <td>{{$category->name}}</td>
                            <td>
                                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-dark btn-sm ">Edit</a>
                                <buuton class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Delete</buuton>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="" method="POST" id="deleteCategoryForm">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center text-bold">
                                        Are You want to delete category?
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
            <h3 class="text-center">Not Categories Yet</h3>
           @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
        function handleDelete(id) {
            // console.log('hello',id);
            var form = document.getElementById('deleteCategoryForm');
            form.action = '/categories/' + id;
            // console.log(form);
            $('#deleteModal').modal('show');

        }
    </script>
    @endsection
