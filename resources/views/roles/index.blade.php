
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
                <span style="margin-left:1rem ">
                  <a href="/user/create" class="btn btn-success" id="user"><b>Create New Role</b></a>
                </span>
<div class="container  pt-3">
           
  <h2>Roles</h2>
<table class="table" >
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Role</th>
        <th scope="col">Actions</th>

      </tr>
    </thead>
    @foreach ($roles as $post)
    <tbody>
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->name}}</td>
    
  
  <td>
    
         <a href="{{ route('roles.edit',$post->id) }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>
         <a href="/roles/{{$post->id}}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View </a>
         {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $post->id],'style'=>'display:inline']) !!}
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
</div>


@endsection
