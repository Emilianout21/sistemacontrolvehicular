var mymap = L.map('mapid').setView([0, 0], 2);
var destinoMarker;
var latitud;  // Definir latitud y longitud en un ámbito más amplio
var longitud;

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(mymap);

// Función para obtener la posición actual del usuario
function obtenerPosicionActual() {
    navigator.geolocation.getCurrentPosition(function(position) {
        latitud = position.coords.latitude;
        longitud = position.coords.longitude;

        mymap.setView([latitud, longitud], 13);

        L.marker([latitud, longitud]).addTo(mymap)
            .bindPopup('Posición Actual')
            .openPopup();
    });
}

// Función para iniciar la selección del destino en el mapa
function iniciarSeleccionDestino() {
    // Cambiar el cursor al hacer clic en "Seleccionar Destino en el Mapa"
    document.getElementById('mapid').style.cursor = 'url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'black\' width=\'32px\' height=\'32px\'%3E%3Cpath d=\'M0 0h24v24H0z\' fill=\'none\'/%3E%3Cpath d=\'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2z\'/%3E%3C/svg%3E") 16 16, pointer';

    mymap.on('mousedown', function(e) {
        var destinoLat = e.latlng.lat;
        var destinoLong = e.latlng.lng;

        // Actualizar el campo de entrada con las coordenadas del destino
        document.getElementById('destinoInput').value = destinoLat + ', ' + destinoLong;

        // Eliminar el marcador anterior si existe
        if (destinoMarker) {
            mymap.removeLayer(destinoMarker);
        }

        // Agregar un nuevo marcador en la ubicación seleccionada
        destinoMarker = L.marker([destinoLat, destinoLong]).addTo(mymap)
            .bindPopup('Destino Seleccionado')
            .openPopup();

        // Restaurar el cursor después de seleccionar el destino
        document.getElementById('mapid').style.cursor = '';

        // Desvincular el evento de clic después de seleccionar el destino
        mymap.off('mousedown');
    });
}
/*
// Función para calcular la distancia haversine en kilómetros
function calcularDistancia(lat1, lon1, lat2, lon2) {
    // Radio de la Tierra en kilómetros
    var radioTierra = 6371;

    // Convertir las coordenadas de grados a radianes
    var latitud1Rad = toRadians(lat1);
    var longitud1Rad = toRadians(lon1);
    var latitud2Rad = toRadians(lat2);
    var longitud2Rad = toRadians(lon2);

    // Diferencias en las coordenadas
    var deltaLatitud = latitud2Rad - latitud1Rad;
    var deltaLongitud = longitud2Rad - longitud1Rad;

    // Fórmula haversine
    var a = Math.sin(deltaLatitud / 2) * Math.sin(deltaLatitud / 2) +
            Math.cos(latitud1Rad) * Math.cos(latitud2Rad) *
            Math.sin(deltaLongitud / 2) * Math.sin(deltaLongitud / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

    // Distancia en kilómetros
    var distancia = radioTierra * c;

    return distancia;
}

// Función para convertir grados a radianes
function toRadians(grados) {
    return grados * (Math.PI / 180);
} */

// Función para calcular la ruta y mostrar la distancia en el mapa
function calcularRuta() {
    // Obtener las coordenadas del destino desde el campo de entrada
    var destinoInput = document.getElementById('destinoInput').value;
    var [destinoLat, destinoLong] = destinoInput.split(',').map(parseFloat);

    // Verificar si latitud y longitud están definidas
    if (typeof latitud === 'undefined' || typeof longitud === 'undefined') {
        console.error('Las coordenadas de la posición actual no están definidas.');
        return;
    }

    // Crear una capa de ruta y agregarla al mapa usando Leaflet Routing Machine
    var controlRuta = L.Routing.control({
        waypoints: [
            L.latLng(latitud, longitud),
            L.latLng(destinoLat, destinoLong)
        ],
        routeWhileDragging: true, // Actualiza la ruta mientras se arrastra el marcador
        lineOptions: {
            styles: [{ color: '#0077ff', opacity: 0.7, weight: 5 }]
        }
    }).addTo(mymap);

    // Manejar eventos de ruta (opcional)
    controlRuta.on('routeselected', function (e) {
        // Acciones adicionales después de que se ha seleccionado la ruta
        var rutaSeleccionada = e.route;
        var distanciaTotal = rutaSeleccionada.summary.totalDistance; // Distancia en metros
        var distanciaEnKm = distanciaTotal / 1000; // Convertir a kilómetros

        console.log('Distancia total de la ruta:', distanciaEnKm.toFixed(2), 'km');

        // Mostrar la distancia en el input si existe
        var distanciaInput = document.getElementById('distanciaInput');
        if (distanciaInput) {
            distanciaInput.value = distanciaEnKm.toFixed(2) + ' km';
        } else {
            console.error('El elemento con ID "distanciaInput" no fue encontrado.');
        }

        // Envía la información de la ruta al servidor (puedes usar AJAX para esto)
        guardarRutaEnBaseDeDatos(latitud, longitud, destinoLat, destinoLong);
    });
}


// Función para enviar la información de la ruta al servidor
function guardarRutaEnBaseDeDatos(inicioLat, inicioLong, destinoLat, destinoLong) {
    // Envía la información al servidor (puedes usar AJAX para esto)
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'guardar_ruta.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    var params = 'inicioLat=' + inicioLat +
                 '&inicioLong=' + inicioLong +
                 '&destinoLat=' + destinoLat +
                 '&destinoLong=' + destinoLong;

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log('Ruta guardada en la base de datos.');
        }
    }

    xhr.send(params);
}



