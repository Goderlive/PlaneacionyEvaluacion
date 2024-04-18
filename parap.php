<!DOCTYPE html>
<html>
<head>
    <title>Mapa de Ruta con Leaflet.js</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        #mapid { height: 400px; }
    </style>
</head>
<body>
    <div id="mapid"></div>
    

    <script>
      // Inicializa el mapa en una ubicación y zoom especificados
var mymap = L.map('mapid').setView([40.416775, -3.703790], 13);

// Añade una capa de tiles al mapa
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mymap);

// Puntos de la ruta
var puntoA = L.marker([40.416775, -3.703790]).addTo(mymap).bindPopup("Inicio en Madrid");
var puntoB = L.marker([40.420110, -3.705768]).addTo(mymap).bindPopup("Fin en Madrid");

// Dibuja una línea entre los puntos
var ruta = L.polyline([
    [40.416775, -3.703790],
    [40.420110, -3.705768]
], {color: 'red'}).addTo(mymap);

// Ajusta la vista del mapa para mostrar todos los marcadores
mymap.fitBounds(ruta.getBounds());

    </script>
</body>
</html>
