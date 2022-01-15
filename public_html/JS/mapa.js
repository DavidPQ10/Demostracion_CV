let map;

function initMap() {
    var latitud = 9.971103;
    var longitud = -83.997934;

    coordenadas = {
        lng: longitud,
        lat: latitud
    }

    genMap(coordenadas);
}

function genMap(coordenadas) {

    var mapa = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng),
        zoom: 8
    });
    marcador = new google.maps.Marker({
        map: mapa,
        draggable: true,
        position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
    });
    
    marcador.addListener("dragend", function(event){
        document.getElementById("txtDireccion").value = "Latitud: " + this.getPosition().lat() + " // Longitud: " + this.getPosition().lng();
        
    });
}