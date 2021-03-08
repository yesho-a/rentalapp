  @extends('layouts.admin')
  @section('content')
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <div class="container" style="padding: 1rem;">
                    <div class="row">
                      <div class="col">
                        <h2><b>List of Properties</b></h2>

         <div class="container  pt-2">
           
         
            <table class="table table-success" id="table" >
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Amount</th>
                     <th class="no-sort">Actions</th>



                  </tr>
               </thead>

               <tbody>

                @foreach($property as $k)
                 <tr>
                 <td>{{$k->id}}</td>
                 <td>{{$k->propertyname}}</td>
                 <td>{{$k->amount}}</td>
                 <td>  
                    <a href="{{ route('property.edit',$k->id) }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>
                    <a href="/property/{{$k->id}}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View </a>
                    {!! Form::open(['method' => 'DELETE','route' => ['property.destroy', $k->id],'style'=>'display:inline']) !!}
                    {{ Form::button('<i class="fa fa-trash"><span style="margin-left:5px">Delete</span></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger'] )  }}
                {!! Form::close() !!}
                   </td>
                 </tr>
                 @endforeach
               </tbody>
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
        "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ]
    });})

 </script>
 @endsection

