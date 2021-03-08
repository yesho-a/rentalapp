
  @extends('layouts.admin')

  @section('content')

<style>

  </style>
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <div class="container" style="padding: 1rem;">
                    <div class="row">
                      <div class="col">
                        <h2><b>All Tenants</b></h2>

         <div class="container  pt-2">
           
         
            <table class="table table-success" id="table" >
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th  class="nosort">Email</th>
                     <th>Property</th>
                     <th>Amout Due</th>

                     <th style="text-align: center" class="nosort">Actions</th>


                  </tr>
               </thead>

               <tbody>

                @foreach($tenant as $k)
                 <tr>
                 <td>{{$k->id}}</td>
                 <td>{{$k->name}}</td>
                 <td>{{$k->email}}</td>
                 <td>{{$k->property->propertyname}}</td>
                <td>
                  @if (count($k->payments)>=1)
                  @if((\Carbon\Carbon::now()->startOfMonth()->subMonth()->diffInMonths(($k->latestPayment->rent_to), false)) < 1)
                  {{(\Carbon\Carbon::now()->diffInMonths( $k->latestPayment->rent_to))*($k->property->amount)}}
                  @else
                  0          
                  @endif
                  @else
                  <p>No Payment</p> @endif
                </td>


             


                 <td style="text-align: center" > <a href="javascript:;" data-toggle="modal" data-target="#simo{{ $k->id }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>

                    <a href="javascript:;" class="btn btn-xs btn-primary"  id="show-customer" data-toggle="modal" data-target="#crud-modal-show-{{$k->id}}" ><i class="fa fa-eye"></i> View </a>

                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$k->id}})" 
                      data-target="#DeleteModal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
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
          "targets": 'nosort',
          "orderable": false,
    } ]


      

    });})

 </script>


 @endsection

