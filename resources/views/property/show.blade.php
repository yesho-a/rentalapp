
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
<div class="container text-left" style="margin-top: 3rem">
    <div class="card mb-3 bg-light" style="max-width: 840px;padding:1rem;">
        <div class="row no-gutters">
          <div class="col-md-3 " >
        
            <div class="row h-100 ">
              <div class="col-sm-12 my-auto ">
                <div class="card card-block w-100 "> <img style="width:100%;height:20rem;" src="/storage/images/" alt="">
                </div>
              </div>
           </div>
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <h3 class="card-title"><strong>Property for Rent</strong></h3>
              <table class="table table-striped">
                <tr>
                <td><strong>ID:</strong></td>
                <td>{{$property->id}}</td>
                </tr>
                <tr>
                <td><strong>Property Name:</strong></td>
                <td>{{$property->propertyname}}</td>
                </tr>
                <tr>
                    <td><strong>Rent:</strong></td>
                    <td>{{$property->amount}}</td>
                    </tr>
                
                
                  
          </table>   </div>
          </div>
        </div>
      </div>
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