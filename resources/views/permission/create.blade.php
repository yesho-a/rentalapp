
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
    {!! Form::open(['action'=>'App\Http\Controllers\PermissionController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}



    <div class="form-group">
        {{ Form::label('permission', 'Permission') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div><br>
   
    <br>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
