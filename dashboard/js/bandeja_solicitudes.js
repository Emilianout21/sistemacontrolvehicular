//Funcion con sweet alerts para asignar

  //Sweet alert para asignacion
$('#asignarForm').submit(function (event) {
  event.preventDefault();
  $.ajax({
      type: 'POST',
      url: '../controladores/asignar_vehiculo.php',
      data: $(this).serialize(),
      dataType: 'json',
      success: function(response) {
          if (response.status === 'success') {
              Swal.fire({
                  icon: 'success',
                  title: 'Asignación exitosa',
                  text: response.message,
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.isConfirmed) {
                      // Puedes redirigir a otra página o hacer algo más después de hacer clic en OK
                      location.reload();                  }
              });
          } else {
              // Muestra una alerta de error
              Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: response.message,
                  confirmButtonColor: '#d33',
                  confirmButtonText: 'OK'
              });
          }
      },
      error: function() {
          // Muestra una alerta si hay un error de comunicación
          Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Hubo un error de comunicación con el servidor.',
              confirmButtonColor: '#d33',
              confirmButtonText: 'OK'
          });
      }
  });
});

     // Función para cargar datos en el modal de asignar
     function cargarDatosEnModalAsignar(id_remitente ) {
        document.getElementById('asignarChofer').value = id_remitente;
         // Obtener el ID del vehículo seleccionado
        var idVehiculoSeleccionado = document.getElementById('asignarVehiculo').value;
        // Asignar el ID al campo oculto
        document.getElementById('idVehiculoSeleccionado').value = idVehiculoSeleccionado;
 
        // Mostrar el modal
        $('#asignarModal').modal('show')
    
    }



    //cargar datos al modal de lectura
    function cargarDatosEnModalMensaje(nombre, asunto, fecha, mensaje) {
       document.getElementById('viewRemitente').value = nombre;
        document.getElementById('viewAsunto').value = asunto;
      /*  document.getElementById('viewFecha').value = fecha; */
        document.getElementById('viewMensaje').value = mensaje; 

        // Mostrar el modal
        $('#viewModal').modal('show');
    }


