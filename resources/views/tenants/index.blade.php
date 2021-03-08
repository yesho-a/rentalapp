@extends('layouts.app')
@section('content')

<script>
  $(document).ready(function(){
    $(".submit-btn").mouseenter(function(){
    });

   //$("#due").css('background-color','red');
   $("#due").css("font-style","italic");

      });

  function deleteData(id)
  {
      var id = id;
      var url = '{{ route("tenant.destroy", ":id") }}';
      url = url.replace(':id', id);
      $("#deleteForm").attr('action', url);
  }

  function formSubmit()
  {
      $("#deleteForm").submit();
  }
</script>
<div class="container" style="padding: 1rem;">
    <div class="row">
      <div class="col">
  <h3>Tenants</h3>
  
  <div style="margin-top: 1rem;">
  <table class="table table-dark" >
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Actions</th>
  
        </tr>
      </thead>
      @foreach ($tenant as $post)
      <tbody>
        <tr>
          <th scope="row">{{$post->id}}</th>
          <td>{{$post->name}}</td>
          <td>{{$post->email}}</td>
          <td>0{{$post->phone}}</td>    
    <td>
      <a href="/tenant/{{$post->id}}" class="btn btn-xs btn-primary"  ><i class="fa fa-eye"></i> View </a>
      <a href="/tenant/{{$post->id}}/edit" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>
      <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$post->id}})" 
        data-target="#DeleteModal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
    </td>
    </tr>
         
        </tbody>
        @endforeach
    </table>
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