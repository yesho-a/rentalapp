
 
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<h3>Tenants</h3>
      
<table class="table table-info"  >
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Rented Property</th>
        <th scope="col">Latest Payment</th>
        <th scope="col">Amount Due</th>


      </tr>
    </thead>
    @foreach ($tenant as $post)
    <tbody>
      <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->name}}</td>
      <td>{{$post->email}}</td>
      <td>0{{$post->phone}}</td>
      <td>{{$post->property['propertyname']}}</td>
      <td>{{$post->payments->first()['amount']}}</td>
      
    <td>@if (count($post->payments)>=1)
      @if ((\Carbon\Carbon::now()->startOfMonth()->subMonth()->diffInMonths(($post->payments->first()->rent_to), false)) < 1)
      {{(\Carbon\Carbon::now()->diffInMonths( $post->payments->first()['rent_to']))*($post->property->amount)}}
      
      @else
      0
      @endif
      @else
      <p>No Payment Made</p>
          
      @endif</td>




      </tr>
     
    </tbody>
    @endforeach
  </table>

    
  


