


@extends('layouts.admin')

@section('title', '| Edit Tenant')

@section('content')

<div class="container text-sm">
  <div class="row justify-content-center">
      <div class="col-md">
          <div class="card">
              <div class="card-body">
                  <div class="container" style="padding: 1rem;">
                      <div class="row">
                        <div class="col"> 


    <h1><i class='fa fa-user-plus'></i> Edit {{$tenant->name}}</h1>
    <hr>
{!! Form::open(['action'=>['App\Http\Controllers\TenantController@update',$tenant->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}


<div class="form-group">

    {{Form::label('name','Name')}}
    {{Form::text('name',$tenant->name,['class'=>'form-control','placeholder'=>'name'])}}

</div>
<div class="form-group">

    
    {{Form::label('email','Email')}}
    {{Form::text('email',$tenant->email,['class'=>'form-control','placeholder'=>'email'])}}
</div>
<div class="form-group">

    
    {{Form::label('phone','Phone')}}
    {{Form::text('phone',$tenant->phone,['class'=>'form-control','placeholder'=>'phone'])}}
</div>
<div class="form-group">

    {{Form::file('image')}}

</div>
{{Form::hidden('_method','PUT')}}
{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    
{!! Form::close() !!}

</div>
        
</div>
</div>


@endsection

