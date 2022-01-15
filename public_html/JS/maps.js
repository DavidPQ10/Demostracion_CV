let map;

function initMap() {
    var latitud = 9.967024197704605;
    var longitud = -83.99864210317993;

    coordenadas = {
        lng: longitud,
        lat: latitud
    }

    genMap(coordenadas);
}

function genMap(coordenadas) {

    var mapa = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng),
        zoom: 14
    });
    marcador = new google.maps.Marker({
        map: mapa,
        draggable: false,
        position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
    });
    
}