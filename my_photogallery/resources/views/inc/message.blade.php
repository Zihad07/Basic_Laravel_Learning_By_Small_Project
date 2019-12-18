
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger mt-2" role="alert">
            <strong>{{$error}}</strong>
        </div>
    @endforeach
@endif


@if(session('success'))
    <div class="alert alert-success mt-2" role="alert">
        <strong>{{session('success')}}</strong>
    </div>
@endif


@if(session('error'))
    <div class="alert alert-danger mt-2" role="alert">
        <strong>{{session('error')}}</strong>
    </div>
@endif
