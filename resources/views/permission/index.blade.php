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

  <h2>Permissions</h2>
<table class="table" >
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Permission</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    @foreach ($permissions as $post)
    <tbody>
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->name}}</td>
     
  
  <td>
    

    <a href="{{ route('permission.edit',$post->id) }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>
    {!! Form::open(['method' => 'DELETE','route' => ['permission.destroy', $post->id],'style'=>'display:inline']) !!}
    
    {{ Form::button('<i class="fa fa-trash"><span style="margin-left:5px">Delete</span></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger'] )  }}


{!! Form::close() !!}
  



   </td>
  
 
        
        </tr>
       
      </tbody>
      @endforeach
  </table>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


@endsection
