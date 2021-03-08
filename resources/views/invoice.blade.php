<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<style type="text/css">
@media print {
  .noprint { display: none; }
  .img-fluid {
            max-height: 100%;
        }
        
        body {
            margin-right: 2rem;
            margin-left: 2rem;
            margin-top: 5rem;

            font-family: "Lucida Console", Courier, monospace;
        }
        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
	border:0;
	padding:0;
	margin-left:-0.00001;
}



}


  </style>

<?php
$path = 'storage/images/alogo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<body>

<div class="container-full">
    <div class="row">
        <div class="col-xs-7" style="padding-top:3rem;padding-bottom:1px;">
            <table class="table table-borderless " >
                <tbody>
                    <tr>
                        <td><b>From</b>
                        </td>
                        <td style="font-family: Lucida Console , Courier, monospace;padding-bottom:2rem; ">Anan Property Management<br>Sipi Town Council<br>Kapkwirwok,Kapchorwa District</td>
                    </tr>

                    <tr>
                        <td><b>To</b>
                        </td>
                    <td style="font-family: Lucida Console , Courier, monospace; ">{{$tenant->name}}<br> {{$tenant->property->propertyname}}<br>Sipi Town Council<br>Kapkwirwok,Kapchorwa District</td>
                    </tr>
                </tbody>
            </table>
            
            
        </div>

        <div class="col-xs-5">

            <img  src="<?php echo $base64?>" class="img-fluid " alt="Responsive image " style="height:90 "><br>

                  <div style="border: 2px solid rgb(197, 167, 167);text-align:center;margin-top:1px;margin-bottom:3rem;padding:1px;background-color:blanchedalmond "> <span>
                <h3><strong>Rental Invoice</strong></h3>
                </span></div>
                Invoice No#: {{ $tenant->property->propertyname.$tenant->payments->first()->id.(\Carbon\Carbon::now()->startOfMonth()->subMonth()->timestamp)}}<br>

                Date: {{\Carbon\Carbon::now()->startOfMonth()->toDateString() 
               }}<br>
                 <b>Date Due:{{ \Carbon\Carbon::now()->startOfMonth()->addDays(15)->toDateString()
                 }} </b>
        </div>
    </div>
</div>


<div class="container " style="margin-top: 6rem;margin-bottom:1rem; ">
    <div class="row ">
        <div class="col-xs-12 text-center">
            <table class="table table-bordered ">
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col ">Description</th>
                        <th scope="col ">Amount(Ushs)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding-bottom: 8rem; "> B/Fwd From Previous Invoice<br><br>Rent {{ \Carbon\Carbon::now()->startOfMonth()->subMonth()->toDateString() }} to {{ \Carbon\Carbon::now()->startOfMonth()->toDateString() }}
                        </td>
                        <td>@if ((\Carbon\Carbon::now()->startOfMonth()->subMonth()->diffInMonths(($tenant->payments->first()->rent_to), false)) < 1)
                            {{(\Carbon\Carbon::now()->startOfMonth()->subMonth()->diffInMonths( $tenant->payments->first()->rent_to)) * $tenant->property->amount }}
                            
                            @else
                            0
                            @endif
                            <br><br>{{$tenant->property->amount}}</td>

                    </tr>
                    <tr>
                        <td style="text-align: right;"><strong>Total Amount Due:</strong> </td>
                        <td>
                            <b> @if (count($tenant->payments)>=1)
                                @if ((\Carbon\Carbon::now()->startOfMonth()->subMonth()->diffInMonths(($tenant->payments->first()->rent_to), false)) < 1)
                                {{(\Carbon\Carbon::now()->diffInMonths( $tenant->payments->first()['rent_to']))*($tenant->property->amount)}}
                                
                                @else
                                0
                                @endif
                                @else
                                <p>No Payment Made</p>
                                    
                                @endif </b></td>

                    </tr>

                </tbody>
            </table>
        <strong><span style="margin-bottom:3rem;margin-top:3rem"> Tenant : {{$tenant->name}}</span></strong><br>
        <strong><span style="margin-bottom:3rem;margin-top:3rem"> Issued By : {{ Auth::user()->name }}</span></strong>

        </div>
    </div>
</div>

<hr style=" border: 2px solid black; ">
    <footer>
        <div class="row " >
           
            <div class="col-md-4">

                <p><img  src="<?php echo $base64?> " class="img-fluid " alt="Responsive image " style="height:90px "><br>
                </p>
            </div>

            <div class="col-md-4 ">
                <p style="font-family: Lucida Console , Courier, monospace; ">Anan Property Management<br>Sipi Town Council<br>Kapkwirwok, Kapchorwa</p>

            </div>
            <div class="col-md-4 ">
                <p style="font-family: Lucida Console , Courier, monospace; ">www.ananproperty.com<br>Info@ananproperty.com<br>+256783742443
                </p>
            </div>
        </div>
        <hr style=" border: 2px solid black; margin:4px">

    </footer>




</body>
</html>

