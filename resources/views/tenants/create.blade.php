@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="container" style="padding: 1rem;">
                        <div class="row">
                          <div class="col mr-5 ml-5">
                            <h1> <strong></i>Add Tenant</u></strong></h1>
                            
{!! Form::open(['action'=>'App\Http\Controllers\TenantController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
<div class="form-group">
    {!! Form::label('Property', 'Property For Rent') !!}
   {!! Form::select('property_id', $property, null, ['class' => 'form-control']) !!}

</div>
<div class="form-group">

    {{Form::label('name','Name')}}
    {{Form::text('name','',['class'=>'form-control','placeholder'=>'name'])}}

</div>


<div class="form-group">

    
    {{Form::label('email','Email')}}
    {{Form::text('email','',['class'=>'form-control','placeholder'=>'email'])}}
</div>
<div class="form-group">

    
    {{Form::label('phone','Phone')}}
    {{Form::text('phone','',['class'=>'form-control','placeholder'=>'phone'])}}
</div>
<div class="form-group">

    {{Form::file('image')}}

</div>
{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    
{!! Form::close() !!}

</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection