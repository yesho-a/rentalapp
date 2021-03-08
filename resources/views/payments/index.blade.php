@extends('layouts.admin')
@section('content')


    <div class="row">

        <div class="col" style="padding: 2rem">
            <h5>All Payments</h5>

  <table class="table table-success" id="table" >


    <thead>
      <tr>
        <th scope="col">Payment ID</th>
        <th scope="col">Paid Amount</th>
        <th scope="col">Rent From</th>
        <th scope="col">Rent To</th>
        <th scope="col">Paid By</th>

        <th scope="col">Actions</th>

      </tr>
    </thead>
    @foreach ($payments as $post)
    <tbody>
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->amount}}</td>
        <td>{{$post->rent_from}}</td>
        <td>{{$post->rent_to}}</td>
        <td>{{$post->tenant['name']}}</td>


        <td>  
          
          <!-- <a href="/payments/{{$post->id}}/edit" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a> -->
          <a href="{{ route('payment.edit',$post->id) }}" data-toggle="modal" data-target="#myEditModal{{ $post->id }}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit </a>
          <a href="/payments/{{$post->id}}" class="btn btn-xs btn-primary"  id="show-customer" data-toggle="modal" data-target="#crud-modal-show-{{$post->id}}" ><i class="fa fa-eye"></i> View </a>
         
            {!! Form::open(['method' => 'DELETE','route' => ['payment.destroy', $post->id],'style'=>'display:inline']) !!}
         {{ Form::button('<i class="fa fa-trash"><span style="margin-left:5px">Delete</span></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger'] )  }}


     {!! Form::close() !!}
      </tr>
     
    </tbody>
    @endforeach
  </table>
        </div>
    </div>

    
    













































@endsection