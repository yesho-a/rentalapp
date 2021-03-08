@extends('layouts.admin')
@section('content')
<div class="container text-left" style="margin-top: 0px">
<div class="card mb-3 bg-light pl-5 pt-2" style="max-width: 840px;">
    <div class="row no-gutters ">
      <div class="col-md-3 mt-5" >
        <span >
          <a href="{{action('App\Http\Controllers\TenantController@invoice',['id' => $tenant->id])}}" class="btn btn-danger"><i class="fa fa-download"></i> Invoice</a><br><br>
          <a href="{{action('App\Http\Controllers\TenantController@sendinvoice',['id' => $tenant->id])}}" class="btn btn-primary"><i class="fa fa-envelope"></i> Invoice</a>
        </span>
        <div class="row h-80 pt-5">
          <div class="col-sm-12 my-auto ">
            <div class="card card-block w-100 "> <img style="width:100%;height:15rem;" src="/storage/images/{{$tenant->image}}" alt=" {{$tenant->image}}">
            </div>


          </div>
       </div>
      </div>
      <div class="col-md-9">
        <div class="card-body">
          <h1 class="card-title pb-2" style="font-size: 25px"><strong>Tenant Profile</strong></h1>
          <table class="table table-striped">
            <tr>
            <td><strong>Name:</strong></td>
            <td>{{$tenant->name}}</td>
            </tr>
            <tr>
            <td><strong>Email:</strong></td>
            <td>{{$tenant->email}}</td>
            </tr>
            <tr>
                <td><strong>Phone:</strong></td>
                <td>0{{$tenant->phone}}</td>
                </tr>
            <tr>
                <td><strong>Property:</strong></td>
                <td>{{$tenant->property->propertyname}}</td>
            </tr>
            
            
            <tr>
                <td><strong>Paid Upto: </strong></td>
                <td>
                  @if (count($tenant->payments)>=1)
                    {{ $tenant->payments->first()->rent_to }} 
                    @else
                    <p>No Previous Payment</p>
                    @endif
              
              </td>
            </tr>
            <tr>
              <td><strong>Payments </strong></td>
              <td>
                @if (count($tenant->payments)>=1)
               
          <a class="btn btn-warning m-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            View All Payments
          </a>
       
        <div class="collapse" id="collapseExample">
          <div class="card card-body">
            @foreach($tenant->payments as $payment)
             
            Rent From: {{ $payment->rent_from  }} 
         

            To: {{ $payment->rent_to }}<br><b>: Ushs

      {{$payment->amount }}<br></b><small> <span style="color: red">Paid on: {{ $payment->created_at->format('Y-m-d')  }} </span> </small><br>
      
        @endforeach

          </div>
        </div>
        @else
        No Previous Payment
        @endif
       



            </td>
          </tr>
      
           


           
          
        

             
      <tr>
        <td><strong>Balance Forward: </strong></td>
        <td>
          @if (count($tenant->payments)>=1)
           @if ((\Carbon\Carbon::now()->startOfMonth()->subMonth()->diffInMonths(($tenant->payments->first()->rent_to), false)) < 1)
          {{(\Carbon\Carbon::now()->startOfMonth()->subMonth()->diffInMonths( $tenant->payments->first()->rent_to)) * $tenant->property->amount }}
          
          @else
          0
          @endif
          @else
          <p>No Previous Payment</p>
              
          @endif
        </td>
        

    </tr>
      
        <tr>
            <td><strong>Total Amount Due: </strong></td>
            <td> @if (count($tenant->payments)>=1)
              @if ((\Carbon\Carbon::now()->startOfMonth()->subMonth()->diffInMonths(($tenant->payments->first()->rent_to), false)) < 1)
              {{(\Carbon\Carbon::now()->diffInMonths( $tenant->payments->first()['rent_to']))*($tenant->property->amount) }}
              
              @else
              0
              @endif 
              @else
              <p>No Previous Payment</p>
                  
              @endif</td>
        </tr>
      </table> <p class="card-text"><small class="text-muted">Last updated:{{(\Carbon\Carbon::now()->diffInDays( $tenant->updated_at))}} days ago</small></p>
        </div>
      </div>
    </div>
  </div>
</div>





  
@endsection
