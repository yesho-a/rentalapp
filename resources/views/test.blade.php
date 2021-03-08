@extends('layouts.admin')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md">
          <div class="card">
              <div class="card-body">
                  <div class="container" style="padding: 1rem;">
                      <div class="row">
                        <div class="col mr-5 ml-5">
             <h1> <strong>Make Payment</strong></h1>
      {!! Form::open(['action'=>'App\Http\Controllers\PaymentController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
      <div class="form-group">
        <label for="exampleFormControlInput1"><h6><b>Select Tenant</b></h6></label>
        <select name="tenant_id" id="labC" class="form-control">
         <option value="0" disabled="true" selected="true">Select Tenant</option>
         @if(isset($payments))
             @foreach($payments as $lb)
                 <option value="{{$lb['id']}}">{{$lb['name']}}</option>
             @endforeach
         @endif
       </select>
      </div>
      <div class="form-group">
          <label><h6><b>Rent From</h6></label>
          <input type="date" name="rent_from" readonly class="form-control" id="rema">
      </div>
    
      <div class="form-group">
        <label><h6><b>Rent To</b></h6></label>
        <input type="date" name="rent_to" class="form-control" id="rema2">
    </div>

      <div class="form-group">
  
          <label><h6><b>Amount Due</b></h6></label>
          <input type="text" name="amount" id="labS" readonly placeholder="Enter Rent Amount" class="form-control">  
      </div>

      {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
  
      {!! Form::close() !!}


</div>


<script>

  $(document).ready(function() {
     $('#labC').on('change', function(){
   var optionSelected = $(this).find("option:selected");
        tenantSelected  = optionSelected.val();
        console.log(tenantSelected);
                 if(tenantSelected)
         {
            jQuery.ajax({
               type:"GET",
               url : '/list',
               data:{tenantSelected:tenantSelected},
              dataType : "json",
               success:function(data)
               {
                  $('#labS').empty();
                  $('#labS2').empty();
                  $('#labS3').empty();
                  $('labSub').empty();
                  jQuery.each(data, function(key,value){
                      if(tenantSelected == value.id){
                      var sss = data[key].latest_payment;
                     var dateControl = document.querySelector('#rema'); 
                     var dateControl2 = document.querySelector('#rema2');
                     var rpm = value.property.amount;
                     if(sss !== null) { // Covers 'undefined' as well
                      dateControl.value = value.latest_payment.rent_to;
                      dateControl.min = value.latest_payment.rent_to;
                      //dateControl.max = value.latest_payment.rent_to;
                      var dm = new Date (value.latest_payment.rent_to); 
                      dm.setMonth(dm.getMonth() + 1);
                      var dm = (dm.getMonth() + 1) + '/' + dm.getDate() + '/' +  dm.getFullYear();
                      var s = moment(dm).format('YYYY-MM-DD'); // October 18th 2020, 5:15:53 am
                      dateControl2.value = s;
                      dateControl2.min = s;
                      } else {
                       var daizy = new moment().startOf('month').format("YYYY-MM-DD");
                       var ft = moment(daizy).add(1, 'M').format("YYYY-MM-DD");
                        dateControl.value = daizy;
                        dateControl2.value = ft;
                        dateControl2.min = ft;
                       // $('#labS').val(rpm);
                        $('#labS').val(value.property.amount);

                        }   
                      $('#labS').val(value.property.amount);

                       $('#rema2').change(function() {
                       var dt = $('#rema').val();
                       var  d = $('#rema2').val();
                        var ds= moment(new Date(d)).diff(new Date(dt), 'months', true);
                        var st = value.property.amount*ds;
                          $('#labS').val(st);
                          });
                  }
                  });                     
               }
            });
         }
      });

  });
  </script>      
</div>
</div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection