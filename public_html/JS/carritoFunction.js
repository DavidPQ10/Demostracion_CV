
$(document).ready(function () {
    consultarTipoCambio();
});


$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#Boton").click(function () {
        Funcion();
    });
});

function close_session() {
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/session/sesion_destruir.php',
        data: {
            action: "close_session",
            user: "Sesion_Usuario"
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var messageComplete = data.trim();
            var typeOfMessage = messageComplete.substring(0, 2);
            var responseText = messageComplete.substring(2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                window.location = "http://localhost/ProyectoProgramacionv5/public_html/Principal.php";
            } else {//existe un error
                swal("Error", "Error al cerrar la sesión.", "error");
            }
        },
        type: 'POST'
    });
}

function consultarTipoCambio() {

    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/tipoCambio.php',
        type: 'POST',
        data: {
            action: "consultarTipoCambio"
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var json = JSON.parse(data.trim());
            $("#cambio").html(
                    "Tipo de cambio actual del dolar según el BCCR:"+
                    "<br>"+
                    "<ul>"+
                        "<li>Compra: ₡"+json.compra+"</li>"+
                        "<li>Venta: ₡"+json.venta+"</li>"+
                    "</ul>"
//                "<label id='compra'>Compra: "+json.compra+" </label><label id='venta'> // Venta: "+json.venta+"</label>"
            );
        }
    });
}