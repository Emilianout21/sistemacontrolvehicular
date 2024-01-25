<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet con Marcadores en Movimiento y Rutas</title>
    <!-- Leaflet CSS y JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Leaflet Routing Machine CSS y JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
</head>
<body>
    <div id="map" style="height: 500px;"></div>
    <button id="startSimulation">Iniciar Simulación</button>

    <script>
        var map = L.map('map').setView([37.7749, -122.4194], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Crear un grupo de marcadores en movimiento
        var movingCars = L.layerGroup().addTo(map);

        // Datos de ejemplo: ubicaciones iniciales de autos
        var carData = [
            { id: 1, lat: 37.7749, lng: -122.4194, speed: 0.0002, route: [] },
            { id: 2, lat: 37.7749, lng: -122.4294, speed: 0.0003, route: [] },
            // Agrega más datos según sea necesario
        ];

        // Crear rutas y marcadores iniciales
        carData.forEach(function (car) {
            car.routeControl = L.Routing.control({
                waypoints: [
                    L.latLng(car.lat, car.lng),
                    L.latLng(car.lat + 0.01, car.lng + 0.01)  // Punto de destino inicial
                ],
                routeWhileDragging: true,
            }).addTo(map);

            var marker = L.marker([car.lat, car.lng]);
            marker.bindPopup('Car ID: ' + car.id);
            marker.carId = car.id;
            car.marker = marker;
        });

        // Función para actualizar las ubicaciones de los autos
        function updateCars() {
            movingCars.clearLayers(); // Limpiar el grupo de marcadores antes de añadir nuevos

            carData.forEach(function (car) {
                // Actualiza la posición de cada auto
                car.lat += car.speed * Math.random();
                car.lng += car.speed * Math.random();

                // Añade la posición actual a la ruta del auto
                car.route.push([car.lat, car.lng]);

                // Actualiza la ruta del auto
                car.routeControl.setWaypoints(car.route);

                // Añade el nuevo marcador al grupo
                var newMarker = L.marker([car.lat, car.lng]);
                newMarker.bindPopup('Car ID: ' + car.id);
                newMarker.carId = car.id;
                movingCars.addLayer(newMarker);
            });

            // Vuelve a llamar a la función después de un intervalo de tiempo
            setTimeout(updateCars, 1000);
        }

        // Iniciar la simulación al hacer clic en el botón
        document.getElementById('startSimulation').addEventListener('click', function () {
            updateCars();
        });
    </script>
</body>
</html>




