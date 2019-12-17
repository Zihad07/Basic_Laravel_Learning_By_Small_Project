
@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Listing <a href="/dashboard" class="float-right btn btn-md btn-dark">Go Back</a></div>

                <div class="card-body">
                    {!!Form::open(['route'=>'listings.store','mehtod'=>'POST'])!!}
                        <div class="form-group">
                            {{Form::text('name','',['class'=>'form-control','placeholder'=>'Company Name'])}}
                        </div>
                        <div class="form-group">
                                {{Form::text('website','',['class'=>'form-control','placeholder'=>'Company Website'])}}
                        </div>
                        <div class="form-group">
                            {{Form::text('email','',['class'=>'form-control','placeholder'=>'Contact Email'])}}

                        </div>
                        <div class="form-group">
                            {{Form::text('phone','',['class'=>'form-control','placeholder'=>'Contact Phone'])}}

                        </div>
                        <div class="form-group">
                                {{Form::text('address','',['class'=>'form-control','placeholder'=>'Business Address'])}}
                        </div>
                        <div class="form-group">
                                {{Form::textarea('bio','',['class'=>'form-control','placeholder'=>'About This Buisness'])}}
                        </div>

                    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
                    {!!Form::close()!!}

                </div>
            </div>
        </div>
    </div>
@endsection
