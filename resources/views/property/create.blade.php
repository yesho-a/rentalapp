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
                            <h1> <strong><u>Add Property</u></strong></h1>




{!! Form::open(['action'=>'App\Http\Controllers\PropertyController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}

<div class="form-group">

    {{Form::label('property name','Property Name')}}
    {{Form::text('propertyname','',['class'=>'form-control','placeholder'=>'Property Name'])}}
  
</div>
<div class="form-group">

    
    {{Form::label('location','Location')}}
    {{Form::text('location','',['class'=>'form-control','placeholder'=>'location'])}}
</div>
<div class="form-group">

    
    {{Form::label('amount','Amount')}}
    {{Form::text('amount','',['class'=>'form-control','placeholder'=>'amount'])}}
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