<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
  <script>
    $(document).ready(function(){
      var cTable = $('#clientsTable').DataTable({
          searching: true,
          responsive: true,
          bLengthChange: false,
          "autoWidth": false,
          language: {
           searchPlaceholder: 'Search by name..',
           sSearch: '',
           },
           dom: 'Bfrtip',
      buttons: [
        {
          extend: 'collection',
          text: 'Options',
          className: 'btn-outline-secondary',
          buttons: [
            {
              extend: 'excelHtml5',
              className: 'btn-outline-warning',
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'csvHtml5',
              className: 'btn-outline-secondary',
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'pdfHtml5',
              className: 'btn-outline-secondary',
              exportOptions: {
                columns: ':visible'
              }
            }
          ]
        },
        {
          extend: 'colvis',
          className: 'btn-outline-secondary',
          text: 'Columns'
        },
        {
          text: 'Custom Button',
          className: 'btn-purple',
          action: function ( e, dt, node, config ) {
            alert("Custom Button Clicked!!");
          }
        }
      ]
      });
  });
  </script>
 </head>
<body>

  <table id="clientsTable" class="table display responsive nowrap">
    <thead>
        <tr>
            <th>PRODUCT NAME</th>
            <th>BARCODE</th>
            <th>RETAIL PRICE</th>
            <th>UPDATED AT</th>
        </tr>
    </thead>
    <tbody>
      <tr>
            <td>test</td>
            <td>1234</td>
            <td>12</td>
            <td>2018</td>
        </tr>
    </tbody>
</table>
         

   
</body>
</html>
