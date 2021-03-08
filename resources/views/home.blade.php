@extends('layouts.admin')

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
  <style  type="text/css">
    a:hover {
      text-decoration: none;
    }
    </style>
<div class="container text-sm">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="container" style="padding: 1rem;">
                        <div class="row">
                          <div class="col">
                      <span >
                      <a href="/property/create" class="btn btn-success" id="property"><b>Add Property</b></a>
                      <a href="/tenant/create" class="btn btn-primary" id="create"><b>Add Tenant</b></a>
                      <!---<a href="/payments/create" class="btn btn-warning"><b>Make payments</b></a>-->
                      <a href="/payment/create" id="li-modal" class="btn btn-dark text-light"><b>Make Payment</b></a>
                      <a href="/simon" id="li-modal" class="btn btn-danger text-light">
                        <b>Generate PDF</b></a>
                    </span>

                      <div style="margin-top: 1rem;">
                      <table class="table table-primary"  id="table" >
                        <h3 style="color:rgb(24, 22, 22)"><b>Tenants List</b></h3>

                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Rented Property</th>
                              <th scope="col" >Amount Due</th>
                      
                              <th scope="col" style="text-align: center">Actions</th>
                      
                            </tr>
                          </thead>
                          @foreach ($tenant as $post)
                          <tbody>
                            <tr>
                              <th scope="row">{{$post->id}}</th>
                              <td>{{$post->name}}</td>
                              <td>{{$post->email}}</td>
                              <td>0{{$post->phone}}</td>
                              
                              <td style="text-align:center;">
                                @if ($post->property != null)
                                {{$post->property['propertyname']}}
                                @else
                                No Property
                                @endif

                              </td>
                      
                            <td style="text-align:center;">@if (count($post->payments)>=1)
                              @if((\Carbon\Carbon::now()->startOfMonth()->subMonth()->diffInMonths(($post->payments->first()->rent_to), false)) < 1)
                              {{(\Carbon\Carbon::now()->diffInMonths( $post->payments->first()['rent_to']))*($post->property->amount)}}
                              
                              @else
                              0
                              @endif
                              @else
                              <p>No Payment</p>
                                  
                              @endif</td>

                              <td>
                       <!--- <a href="/tenants/{{$post->id}}/edit" id="edit" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a> -->

                        <!---    <a href="/payments/{{$post->id}}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View </a> -->
                        <a href="/tenant/{{$post->id}}" class="btn btn-xs btn-primary"  ><i class="fa fa-eye"></i> View </a>
                        <a href="/tenant/{{$post->id}}/edit"  class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>
                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$post->id}})" 
                          data-target="#DeleteModal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    
                            <?php /*
                      <td style="text-align:right;">
                       
                        <a href="/tenants/{{$post->id}}" > <i class="fa fa-eye" style="font-size: 2em;color:rgb(126, 226, 32);" aria-hidden="true"  data-toggle="tooltip" data-placement="top" title="View Details"></i> </a>

                                <a href="/tenants/{{$post->id}}/edit" ><i class="fa fa-edit" style="font-size: 2em;color:rgb(167, 145, 226);"  data-toggle="tooltip" data-placement="top" title="Edit"></i> </a>
                      </td>
                      <td style="text-align: left;padding-left:0px">
                            
                              <style>
                                  .submit-btn {
                                    padding:0;
                                    background: none;
                                    border:none;
                                }
  
                                </style>
                             {!!Form::open(['action' => ['TenantsController@destroy', $post->id], 'method' => 'POST', 'class' => 'delete','onsubmit' => "return confirm('Are you sure you want to delete?')"])!!}
                                  {{Form::hidden('_method', 'DELETE')}}
                                  {{Form::button('<i class="fa fa-trash-o " style="font-size: 2em;color:rgb(228, 163, 43);"></i>', ['type' =>'submit', 'class' => 'submit-btn btn-sm','id'=>'delete', 'data-toggle'=>"tooltip", 'data-placement'=>"top", 'title'=>"Delete"])}}

                                  {!!Form::close()!!}


                              </td>
                             */ ?>
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

  <!--- Edit Tenant Modal -->
  @foreach ($tenant as $post)

  <div id="theModal{{ $post->id }}" class="modal fade text-left">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h5 class="modal-title " id="exampleModalLabel">Edit Tenant Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        {!! Form::open(['action'=>['App\Http\Controllers\TenantController@update',$post->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
        
        <div class="form-group">
        
            {{Form::label('name','Name')}}
            {{Form::text('name',$post->name,['class'=>'form-control','placeholder'=>'name'])}}
        
        </div>
        <div class="form-group">
        
            
            {{Form::label('email','Email')}}
            {{Form::text('email',$post->email,['class'=>'form-control','placeholder'=>'email'])}}
        </div>
        <div class="form-group">
        
            
            {{Form::label('phone','Phone')}}
            {{Form::text('phone',$post->phone,['class'=>'form-control','placeholder'=>'phone'])}}
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
        
        
        
        
        </div>
    </div>
</div>
@endforeach


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

  <!-- Show Details Modal-->
  @foreach ($tenant as $post)

  <div class="modal fade" id="crud-modal-show-{{$post->id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header bg-warning">
         <h5 class="modal-title w-100 text-center" id="exampleModalLongTitle"  > Tenant Details</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body" style="padding-left: 20%;">

         <table class="table table-borderless">
           <tbody>
             <tr>
              <td><strong>Name:</strong></td>
            <td>{{$post->name}}</td>
             </tr>
             <tr>
              <td><strong>Email:</strong></td>
              <td>{{$post->email}}</td>
             </tr>
             <tr>
              <td><strong>Phone:</strong></td>
              <td>0{{$post->phone}}</td>
             </tr>
             <tr>
              <td><strong>Property:</strong></td>
                <td>
                  @if ($post->property != null)
                                {{$post->property->propertyname}}
              
                  @else
                  No Property

                  @endif
                
                </td>
             </tr>
             <tr>

                  <td><strong>Latest Payment: </strong></td>
                  <td>@if (count($post->payments)>=1)
                    {{($post->payments->first()->amount)}}
                    @else
                    <p>No Payment Made</p>
                    @endif
                </td>
              </tr>
              <tr>
                <td><strong>Total Amount Due: </strong></td>
                <td> @if (count($post->payments)>=1)   @if ((\Carbon\Carbon::now()->startOfMonth()->subMonth()->diffInMonths(($post->payments->first()->rent_to), false)) < 1)
                  {{(\Carbon\Carbon::now()->diffInMonths( $post->payments->first()['rent_to']))*($post->property->amount) }}
                  
                  @else
                  0
                  @endif
                  @else
                  <p>No Payment Made</p>
                      
                  @endif </td>
            </tr>
            
           
           </tbody>
         </table>
   
       </div>
      
     </div>
   </div>
 </div>
 @endforeach


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
