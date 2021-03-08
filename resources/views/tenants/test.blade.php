<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

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
   
    </tr>
         
        </tbody>
        @endforeach
    </table>
  </div>
  
      </div>
    </div>
  </div>