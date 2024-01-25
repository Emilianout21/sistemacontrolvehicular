<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DataTables Export to PDF</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
</head>
<body>

<table id="example" class="display" style="width:100%">
  <thead>
    <tr>
      <th>Name</th>
      <th>Age</th>
      <th>City</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>John Doe</td>
      <td>25</td>
      <td>New York</td>
      <td><button class="generate-pdf">Generate PDF</button></td>
    </tr>
    <tr>
      <td>Jane Smith</td>
      <td>30</td>
      <td>Los Angeles</td>
      <td><button class="generate-pdf">Generate PDF</button></td>
    </tr>
    <!-- Add more rows as needed -->
  </tbody>
</table>

<script>
  $(document).ready(function() {
    var table = $('#example').DataTable({
      dom: 'Bfrtip',
      buttons: [
        {
          extend: 'pdfHtml5',
          title: 'DataTables Export',
          text: 'Export to PDF',
          exportOptions: {
            columns: ':visible'
          }
        }
      ]
    });

    // Agregar evento al botón personalizado para generar PDF por registro
    $('#example tbody').on('click', '.generate-pdf', function() {
      var data = table.row($(this).closest('tr')).data();
      generatePDF(data);
    });

    function generatePDF(data) {
      var docDefinition = {
        content: [
          { text: 'Registro de Viaje', style: 'header' },
          { text: 'Name: ' + data[0] },
          { text: 'Age: ' + data[1] },
          { text: 'City: ' + data[2] },
        ],
        styles: {
          header: {
            fontSize: 18,
            bold: true
          }
        }
      };

      pdfMake.createPdf(docDefinition).download('viaje_reporte.pdf');
    }
  });
</script>

</body>
</html>
