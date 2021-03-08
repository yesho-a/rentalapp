
@extends('layouts.admin')
@section('content')
<div class="container text-sm">
  <div class="row justify-content-center">
      <div class="col-md">
          <div class="card">
              <div class="card-body">
                  <div class="container" style="padding: 1rem;">
                      <div class="row">
                        <div class="col"> 

<h1>Edit  Property</h1>
{!! Form::open(['action'=>['App\Http\Controllers\PropertyController@update',$property->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}

<div class="form-group">

    {{Form::label('property name','Property Name')}}
    {{Form::text('propertyname',$property->propertyname,['class'=>'form-control','placeholder'=>'name'])}}

</div>
<div class="form-group">

    
    {{Form::label('location','Location')}}
    {{Form::text('location',$property->location,['class'=>'form-control','placeholder'=>'location'])}}
</div>
<div class="form-group">

    
    {{Form::label('amount','Amount')}}
    {{Form::text('amount',$property->amount,['class'=>'form-control','placeholder'=>'amount'])}}
</div>

{{Form::hidden('_method','PUT')}}
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



