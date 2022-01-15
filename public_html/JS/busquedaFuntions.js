$(document).ready(function () {
    cargarTabla();
    consultarTipoCambio();
});
var viaje_ruta_seleccionada = null;
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
                    "Tipo de cambio actual del dolar según el BCCR:" +
                    "<br>" +
                    "<ul>" +
                    "<li>Compra: ₡" + json.compra + "</li>" +
                    "<li>Venta: ₡" + json.venta + "</li>" +
                    "</ul>"
//                "<label id='compra'>Compra: "+json.compra+" </label><label id='venta'> // Venta: "+json.venta+"</label>"
                    );
        }
    });
}

verificar_sesion();
establecer_sesion();

function verificar_sesion() {
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/session/sesion_verificar.php',
        data: {
            action: "verify_user",
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
                $("#navCuentaIniciada").show();
                $("#navIniciarSesion").hide();
            } else {//existe un error
                $("#navIniciarSesion").show();
                $("#navCuentaIniciada").hide();
            }
        },
        type: 'POST'
    });
}

function comprar(idRuta) {

    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/session/sesion_verificar.php',
        data: {
            action: "verify_user",
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
                viaje_ruta_seleccionada = idRuta;
                window.location.href = "card.php";
            } else {//existe un error
                window.location.href = "SesionUsuario.php";
            }
        },
        type: 'POST'
    });
}

function establecer_sesion() {
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/usuarioController.php',
        data: {
            action: "show_info"
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion 1", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var messageComplete = data.trim();
            var typeOfMessage = messageComplete.substring(0, 2);
            //var responseText = messageComplete.substring(2);
            if (typeOfMessage !== "E~") {
                var objPersonasJSon = JSON.parse(data);
                $("#UsuarioBtnText").replaceWith(objPersonasJSon.data[0]);
            }
        },
        type: 'POST'
    });
}

function crear_reservacion() {
    var random = parseInt(Math.random(10, 100)*100);
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/reservacionController.php',
        data: {
            action: "add_reservation",
            idRuta: random
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var messageComplete = data.trim();
            var typeOfMessage = messageComplete.substring(0, 2);
            var responseText = messageComplete.substring(2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                window.location = "http://localhost/ProyectoProgramacionv5/public_html/Perfil.php";
            } else {//existe un error
                swal("Error", "Error al cerrar la sesión.", "error");
            }
        },
        type: 'POST'
    });


}

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


//***********************************Tabla*********************************//

function cargarTabla() {

    var dataTableBusqueda_const = function () {
        if ($("#dt_busqueda").length) {
            $("#dt_busqueda").DataTable({
                dom: "Bfrtip",
                bFilter: false,
                ordering: false,
                buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm",
                        text: "Copiar"
                    },
                    {
                        extend: "csv",
                        className: "btn-sm",
                        text: "Exportar a CSV"
                    },
                    {
                        extend: "print",
                        className: "btn-sm",
                        text: "Imprimir"
                    }

                ],

                "columnDefs": [
                    {
                        targets: 7,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-primary" aria-label="Left Align" onclick="comprar(\'' + row[0] + '\')">Comprar</button>';
                            return botones;
                        }
                    }

                ],
                pageLength: 10,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: 'http://localhost/ProyectoProgramacionv5/backend/controller/RutaController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "show_busqueda"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_busqueda').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };


    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTableBusqueda_const();
                $(".dataTables_filter input").addClass("form-control input-rounded ml-sm");
            }
        };
    }();

    TableManageButtons.init();

}

window.onresize = function () {
    $('#dt_busqueda').DataTable().columns.adjust().responsive.recalc();
}
;