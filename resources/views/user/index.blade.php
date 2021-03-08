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
  <h2>Users</h2>
<table class="table" >

    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    @foreach ($user as $post)
    <tbody>
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->name}}</td>
        <td>{{ $post->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
<td> 

  <a href="{{ route('user.edit',$post->id) }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>
  {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $post->id],'style'=>'display:inline']) !!}
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

<div id="DeleteModal" class="modal" role="dialog">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <!-- Modal content-->
    <div class="modal-content">
     
     
            <form action="" id="deleteForm" method="post">

            <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <p class="text-center">Are You Sure Want To Delete ?</p>
            </div>
            <div class="modal-footer" >
                
                    <button type="button" class="btn btn-success" data-dismiss="modal" style="text-align: center">Cancel</button>
                    <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
             
            </div>
        </div>
    </form>
  </div>
 </div>

@endsection





