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
<table class="table table-primary" id="table" >
  <h3 style="color:rgb(24, 22, 22)"><b>Property List</b></h3>

    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Property Name</th>
        <th scope="col">Location</th>
        <th scope="col">Amount</th>
        <th scope="col">Actions</th>

      </tr>
    </thead>
    @foreach ($property as $post)
    <tbody>
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->propertyname}}</td>
        <td>{{$post->location}}</td>
        <td>{{$post->amount}}</td>
        <td>  
          
        

          
         <a href="{{ route('property.edit',$post->id) }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>
         <a href="/property/{{$post->id}}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View </a>
         {!! Form::open(['method' => 'DELETE','route' => ['property.destroy', $post->id],'style'=>'display:inline']) !!}
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

<script>
  $(document).ready(function() {
     $('#table').DataTable({
      
 
       
 
     });})
 
  </script>


@endsection
