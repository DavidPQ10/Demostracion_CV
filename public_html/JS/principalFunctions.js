verificar_sesion();
establecer_sesion();

// // ***************************************************
// * Método para verificar si hay una sesión abierta *
// ***************************************************
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
                if (typeOfMessage!=="E~"){
                    var objPersonasJSon = JSON.parse(data);
                    $("#UsuarioBtnText").replaceWith(objPersonasJSon.data[0]);
                }
            },
            type: 'POST'
        });
}

state_info = 0;
verify_state_info();
function verify_state_info() {
    $("#navInfoOption1").hide();
    $("#navInfoOption2").hide();
    $("#navInfo1").hide();
    $("#navInfo2").hide();
    if (state_info === 0) {
        $("#navInfoOption1").show();
        $("#navInfo1").show();
    } else if (state_info === 1) {
        $("#navInfoOption2").show();
        $("#navInfo2").show();
    }
}

function change_info_state(option) {
    if (option === 0) {
        state_info = 0;
    } else if (option === 1) {
        state_info = 1;
    }
    verify_state_info();
}

$(function () {
    $('#date-picker #salida, #date-picker #regreso').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
    });
});

function close_session(){
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
            window.location="http://localhost/ProyectoProgramacionv5/public_html/Principal.php";
        } else {//existe un error
            swal("Error", "Error al cerrar la sesión.", "error");
        }
    },
    type: 'POST'
});
}


