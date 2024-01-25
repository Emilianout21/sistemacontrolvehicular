//Funcion con sweet alerts para eliminar
function confirmarEliminacion(id) {
    event.preventDefault(); // Detiene el comportamiento predeterminado del botón

    Swal.fire({
        title: '¿Estás seguro?',
        text: 'No podrás revertir esto',
        icon: 'warning',
        theme: 'dark',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, borrarlo'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma la eliminación, realiza la solicitud AJAX para eliminar el registro
            $.ajax({
                type: 'POST',
                url: '../controladores/registro_vehiculo.php', // Reemplaza "tupagina.php" con el nombre de tu archivo PHP
                data: { eliminarRegistro: true, id: id },
                success: function(response) {
                    // Maneja la respuesta del servidor aquí
                    try {
                        const data = JSON.parse(response);
                        if (data.message) {
                            Swal.fire({
                                title: '¡Eliminado!',
                                text: data.message,
                                icon: 'success'
                            }).then(() => {
                                // Actualiza la página después de eliminar el registro
                                location.reload();
                            });
                        } else if (data.error) {
                            Swal.fire({
                                title: 'Error',
                                text: data.error,
                                icon: 'error'
                            });
                        }
                    } catch (error) {
                        console.error("Error al analizar la respuesta JSON", error);
                        console.log(response); // Muestra la respuesta directamente en la consola si hay un error
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error de solicitud:", textStatus, errorThrown); // Manejo de errores de la solicitud AJAX
                }
            });
        }
    });
}
//Funcion para registrar
  document.getElementById('registroForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Realizar la petición AJAX
    var formData = new FormData(this);

    fetch('../controladores/guarda_vehiculo.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === 'success') {
        Swal.fire({
          title: 'Éxito',
          text: data.message,
          icon: 'success'
        }).then(() => {
          location.reload();
        });
      } else {
        Swal.fire({
          title: 'Error',
          text: data.message,
          icon: 'error'
        });
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });
  
  $('#updateForm').submit(function (event){
    event.preventDefault()
    $.ajax({
      type: 'POST',
      url: '../controladores/edita_vehiculo.php',
      data: $(this).serialize(),
      dataType: 'json',
      success: function(response){
        if (response.status === 'success'){
          Swal.fire({
            icon : 'success',
            title: 'Guardado exitoso',
            text: response.message,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'            
          }).then((result) => {
            if (result.isConfirmed) {
                            // Puedes redirigir a otra página o hacer algo más después de hacer clic en OK
                            location.reload();
                        }
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
            error: function () {
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
    })            
 
     // Función para cargar datos en el modal de update
     function cargarDatosEnModal(id, marca, modelo, placas, numSerie, tipo, estatusVehiculo ) {
        document.getElementById('updateId').value = id;
        document.getElementById('updateMarca').value = marca;
        document.getElementById('updateModelo').value = modelo;
        document.getElementById('updatePlacas').value = placas;
        document.getElementById('updateNumSerie').value = numSerie;
        document.getElementById('updateTipo').value = tipo;
        document.getElementById('updateEstatus').value = estatusVehiculo;

 
        // Mostrar el modal
        $('#updateModal').modal('show');
    
    }
    

    //cargar datos al modal de lectura
    function cargarDatosEnModalLectura(id, marca, modelo, placas, numSerie, tipo, estatus) {
        document.getElementById('viewMarca').value = marca;
        document.getElementById('viewModelo').value = modelo;
        document.getElementById('viewPlacas').value = placas;
        document.getElementById('viewNumSerie').value = numSerie;
        document.getElementById('viewTipo').value = tipo;
        document.getElementById('viewEstatus').value = estatus;

        // Mostrar el modal
        $('#viewModal').modal('show');
    }


