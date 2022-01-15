// ***************************************************** //
// *   APARTADO FUNCIONES DE INCICIALIZACIÓN           * //
// ***************************************************** //

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#modificarPerfilBtn").click(function () {
        UpdateUsuario();
    });

    $("#addHorariobtn").click(function () {
        addHorario();
    });

    $("#canceladdHorario").click(function () {
        cancelar_modificarHorario();
    });

    $("#modifyHorariobtn").click(function () {
        opcion_modificar_horario();
    });

    $("#enviar_Avion").click(function () {
        addOrUpdateAvion();

    });
    $("#modif_Avion").click(function () {
        addOrUpdateAvion();
    });
    $("#enviar_Ruta").click(function () {
        addOrUpdateRuta();

    });
    $("#modif_Ruta").click(function () {
        addOrUpdateRuta();
    });


});

var forms = document.querySelectorAll('.needs-validation');
(function () {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
})();

$(function () {
    $('#date-picker #addSalida, #date-picker #addArrivo').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
    });
});

var estado_informacion_perfil = 0;
verify_estado_informacion_perfil();
verificar_sesion_perfil();
change_estado_perfil_opciones(0);
change_estado_opcion_administracion(0);
btn_mod(0);
btn_ruta(0);
poblar_selects();

$(document).ready(function () {
    cargarTablas();
});

var estado_perfil_opciones = 0;

function verify_estado_perfil_opciones() {
    $("#seccionInformacion").hide();
    $("#seccionMisViajes").hide();
    $("#seccionMisReservaciones").hide();
    $("#seccionAdministracion").hide();
    $('#form_check_in').hide();
    if (estado_perfil_opciones === 0) {
        $("#seccionInformacion").show();
    } else if (estado_perfil_opciones === 1) {
        $("#seccionMisViajes").show();
    } else if (estado_perfil_opciones === 2) {
        $("#seccionMisReservaciones").show();
    } else if (estado_perfil_opciones === 3) {
        $("#seccionAdministracion").show();
        $('#dt_usuario').DataTable().columns.adjust().responsive.recalc();
        $('#dt_horarios').DataTable().columns.adjust().responsive.recalc();
        $('#dt_Avion').DataTable().columns.adjust().responsive.recalc();
        $('#dt_Ruta').DataTable().columns.adjust().responsive.recalc();
        $('#dt_reserv').DataTable().columns.adjust().responsive.recalc();
    }else if(estado_perfil_opciones === 4){
        $('#form_check_in').show();
    }
}

function change_estado_perfil_opciones(option) {
    if (option === 0) {
        estado_perfil_opciones = 0;
    } else if (option === 1) {
        estado_perfil_opciones = 1;
    } else if (option === 2) {
        estado_perfil_opciones = 2;
    } else if (option === 3) {
        estado_perfil_opciones = 3;
    }else if(option === 4){
        estado_perfil_opciones = 4;
    }
    verify_estado_perfil_opciones();
}

var estado_opcion_administracion = 0;

function verify_estado_opcion_administracion() {
    $("#perfilOpcionModificarUsuario").hide();
    $("#perfilOpcionModificarHorario").hide();
    $("#perfilOpcionModificarAviones").hide();
    $("#perfilOpcionModificarRutas").hide();
    if (estado_opcion_administracion === 0) {
        $("#perfilOpcionModificarUsuario").show();
    } else if (estado_opcion_administracion === 1) {
        $("#perfilOpcionModificarHorario").show();
    } else if (estado_opcion_administracion === 2) {
        $("#perfilOpcionModificarAviones").show();
    } else if (estado_opcion_administracion === 3) {
        $("#perfilOpcionModificarRutas").show();
        poblar_selects();
    }
}

function change_estado_opcion_administracion(option) {
    if (option === 0) {
        estado_opcion_administracion = 0;
    } else if (option === 1) {
        estado_opcion_administracion = 1;
    } else if (option === 2) {
        estado_opcion_administracion = 2;
    } else if (option === 3) {
        estado_opcion_administracion = 3;
    }
    verify_estado_opcion_administracion();
}

function verify_estado_informacion_perfil() {
    $("#perfilOpcionMiInformacion").hide();
    $("#perfilOpcionEditarInformacion").hide();
    if (estado_informacion_perfil === 0) {
        $("#perfilOpcionMiInformacion").show();
    } else if (estado_informacion_perfil === 1) {
        setModifyInfo();
        $("#perfilOpcionEditarInformacion").show();
    }
}

function change_estado_informacion_perfil(option) {
    if (option === 0) {
        estado_informacion_perfil = 0;
    } else if (option === 1) {
        estado_informacion_perfil = 1;
    }
    verify_estado_informacion_perfil();
}

// ***************************************************** //
// *                APARTADO DE SESION                 * //
// ***************************************************** //

function verificar_sesion_perfil() {
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
            } else {//existe un error
                window.location = "http://localhost/ProyectoProgramacionv5/public_html/Principal.php";
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

// ***************************************************** //
// *                APARTADO INFORMACION               * //
// ***************************************************** //

completar_información_de_usuario();

function completar_información_de_usuario() {

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
            var objPersonasJSon = JSON.parse(data);
            var typeOfMessage = messageComplete.substring(0, 2);
            var responseText = messageComplete.substring(2);
            $("#UserProfileOption").replaceWith(objPersonasJSon.data[0]);
            $("#UsuarioBtnText").replaceWith(objPersonasJSon.data[0]);
            $("#infNamePerfil").replaceWith("<label class=' FontRespuesta' id='infNamePerfil'>" + objPersonasJSon.data[1] + "</label>");
            $("#infLastName1Perfil").replaceWith("<label class='FontRespuesta' align='right' id='infLastName1Perfil'>" + objPersonasJSon.data[2] + "</label>");
            $("#infLastName2Perfil").replaceWith("<label class='FontRespuesta' align='right' id='infLastName1Perfil'>" + objPersonasJSon.data[3] + "</label>");
            $("#infCelularPerfil").replaceWith("<label class='FontRespuesta' align='left' id='infCelularPerfil'>" + objPersonasJSon.data[4] + "</label>");
            $("#infCorreoPerfil").replaceWith("<label class='FontRespuesta' align='left' id='infCorreoPerfil'>" + objPersonasJSon.data[5] + "</label>");
            $("#infDireccionPerfil").replaceWith("<label class='FontRespuesta' align='left' id='infDireccionPerfil'>" + objPersonasJSon.data[6] + "</label>");
            $("#infFechNacimientoPerfil").replaceWith("<label class='FontRespuesta' align='left' id='infFechNacimientoPerfil'>" + objPersonasJSon.data[7] + "</label>");
            $("#infCelilarOficinaPerfil").replaceWith("<label class='FontRespuesta' align='left' id='infCelilarOficinaPerfil'>" + objPersonasJSon.data[8] + "</label>");
            var admin = objPersonasJSon.data[9];
            if (admin === '0') {
                $("#AdminPerfilOption").hide();
            } else if (admin === '1') {
                $("#AdminPerfilOption").show();
            }
        },
        type: 'POST'
    });
}

function setModifyInfo() {
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
            var objPersonasJSon = JSON.parse(data);
            var typeOfMessage = messageComplete.substring(0, 2);
            var responseText = messageComplete.substring(2);
            $("#update_user").val(objPersonasJSon.data[0]);
            $("#update_nombre").val(objPersonasJSon.data[1]);
            $("#update_apellido1").val(objPersonasJSon.data[2]);
            $("#update_apellido2").val(objPersonasJSon.data[3]);
            $("#update_celular").val(objPersonasJSon.data[4]);
            $("#update_email").val(objPersonasJSon.data[5]);
            $("#update_fechaN").val(objPersonasJSon.data[7]);
            $("#update_celularOficina").val(objPersonasJSon.data[8]);
        },
        type: 'POST'
    });
}

function UpdateUsuario() {
    //Se envia la información por ajax    
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/usuarioController.php',
        data: {
            action: $("#typeAction1").val(),
            PK_User: $("#update_user").val(),
            nombre: $("#update_nombre").val(),
            apellido1: $("#update_apellido1").val(),
            apellido2: $("#update_apellido2").val(),
            correoElectronico: $("#update_email").val(),
            fecNacimiento: $("#update_fechaN").val(),
            celular: $("#update_celular").val(),
            celularOficina: $("#update_celularOficina").val()
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var messageComplete = data.trim();
            var typeOfMessage = messageComplete.substring(0, 2);
            var responseText = messageComplete.substring(2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                window.location = "Perfil.php";
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}

// ***************************************************** //
// *         APARTADO Usuario Aministracion            * //
// ***************************************************** //

function deleteUsuarioByID(PK_user) {
    //Se envia la información por ajax
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/usuarioController.php',
        data: {
            action: "delete_usuario",
            PK_User: PK_user
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                $("#dt_usuario").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}

function giveAdmin(PK_user) {
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/usuarioController.php',
        data: {
            action: "give_Admin",
            PK_User: PK_user
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var messageComplete = data.trim();
            var typeOfMessage = messageComplete.substring(0, 2);
            var responseText = messageComplete.substring(2);
            if (typeOfMessage === "M~") {
                swal("Confirmation", responseText, "success");//si todo esta corecto
                $("#dt_usuario").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}

function deleteAdmin(PK_user) {
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/usuarioController.php',
        data: {
            action: "delete_Admin",
            PK_User: PK_user
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var messageComplete = data.trim();
            var typeOfMessage = messageComplete.substring(0, 2);
            var responseText = messageComplete.substring(2);
            if (typeOfMessage === "M~") {
                swal("Confirmation", responseText, "success");//si todo esta corecto
                $("#dt_usuario").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}

var user = null;

function obtener_usuario_de_sesion() {
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/usuarioController.php',
        data: {
            action: "show_info"
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion 1", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objPersonasJSon = JSON.parse(data);
            user = objPersonasJSon.data[0];
        },
        type: 'POST'
    });
}

// ***************************************************** //
// *     APARTADO HORARIOS ADMINISTRACION              * //
// ***************************************************** //

function addHorario() {
    //Se envia la información por ajax
    var salida = $("#addSalida").val() + " " + $("#addSalidaH").val();
    var arrivo = $("#addArrivo").val() + " " + $("#addArrivoH").val();
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/horarioController.php',
        data: {
            action: "add_horario",
            salida: salida,
            arrivo: arrivo

        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var messageComplete = data.trim();
            var typeOfMessage = messageComplete.substring(0, 2);
            var responseText = messageComplete.substring(2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                $("#dt_horarios").DataTable().ajax.reload();
                clearHorarioForm();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });

}

function deleteHorarioByID(PK_horario) {
    //Se envia la información por ajax
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/horarioController.php',
        data: {
            action: "delete_horario",
            PK_horario: PK_horario
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                $("#dt_horarios").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}

function show_info_horario(horario) {
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/horarioController.php',
        data: {
            action: "show_info",
            horarioPK: horario
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion 1", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var jsonObject = JSON.parse(data);
            var salida_date = jsonObject.Salida.substring(0, 10);
            var salida_hora = jsonObject.Salida.substring(11, 19);
            var arrivo_date = jsonObject.Arrivo.substring(0, 10);
            var arrivo_hora = jsonObject.Arrivo.substring(11, 19);
            $("#idhorario").replaceWith('<input type="text" class="form-control" readonly id="idhorario" value="' + jsonObject.idHorario + '">');
            $("#addSalida").val(salida_date);
            $("#addSalidaH").val(salida_hora);
            $("#addArrivo").val(arrivo_date);
            $("#addArrivoH").val(arrivo_hora);
            change_state_horariobtn(1);
        },
        type: 'POST'
    });
}

function cancelar_modificarHorario() {
    $("#idhorario").replaceWith('<input type="text" class="form-control" id="idhorario" placeholder="Id">');
    change_state_horariobtn(0);
    clearHorarioForm();
}

function opcion_modificar_horario() {
    //Se envia la información por ajax
    var salida = $("#addSalida").val() + " " + $("#addSalidaH").val();
    var arrivo = $("#addArrivo").val() + " " + $("#addArrivoH").val();
    var check_in = salida;
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/horarioController.php',
        data: {
            action: "update_horario",
            idHorario: $("#idhorario").val(),
            checkIn: check_in,
            salida: salida,
            arrivo: arrivo

        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var messageComplete = data.trim();
            var typeOfMessage = messageComplete.substring(0, 2);
            var responseText = messageComplete.substring(2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                $("#dt_horarios").DataTable().ajax.reload();
                change_state_horariobtn(0);
                cancelar_modificarHorario();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}

function clearHorarioForm() {
    $('#form_addHorario').trigger("reset");
}

var state_horaioBTN = 0;
verify_state_Horariobtn();
function verify_state_Horariobtn() {
    $("#modifyHorariobtn").hide();
    $("#addHorariobtn").hide();
    $('#canceladdHorario').hide();
    if (state_horaioBTN === 0) {
        $("#addHorariobtn").show();
    } else if (state_horaioBTN === 1) {
        $("#modifyHorariobtn").show();
        $('#canceladdHorario').show();
    }
}

function change_state_horariobtn(option) {
    if (option === 0) {
        state_horaioBTN = 0;
    } else if (option === 1) {
        state_horaioBTN = 1;
    }
    verify_state_Horariobtn();
}

function calcular_check_in(fecha_salida) {
    var date = new Date(fecha_salida.toString());
    var nueva_fecha = "";
    if (date.getDay() !== '01') {
        nueva_fecha = date.getFullYear() + "-" + date.getMonth() + "-" + (date.getDay() - 1);
    } else if (date.getMonth() !== '01') {
        nueva_fecha = date.getFullYear() + "-" + (date.getMonth() - 1) + "-" + (date.getDay() - 1);
    } else {
        nueva_fecha = (date.getFullYear() - 1) + "-" + (date.getMonth() - 1) + "-" + (date.getDay() - 1);
    }
    return nueva_fecha;
}

function addHorario() {
    //Se envia la información por ajax
    var salida = $("#addSalida").val() + " " + $("#addSalidaH").val();
    var arrivo = $("#addArrivo").val() + " " + $("#addArrivoH").val();
    var check_in = salida;
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/horarioController.php',
        data: {
            action: "add_horario",
            idHorario: $("#idhorario").val(),
            checkIn: check_in,
            salida: salida,
            arrivo: arrivo

        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var messageComplete = data.trim();
            var typeOfMessage = messageComplete.substring(0, 2);
            var responseText = messageComplete.substring(2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                $("#dt_horarios").DataTable().ajax.reload();
                cancelar_modificarHorario();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });

}

// ***************************************************** //
// *     APARTADO AVIONES ADMINISTRACION               * //
// ***************************************************** //

function addOrUpdateAvion() {
    //Se envia la información por ajax    
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/AvionController.php',
        data: {
            action: $("#typeAction").val(),
            idAvion: $("#txtidAvion").val(),
            Anio: $("#txtAnio").val(),
            Modelo: $("#txtModelo").val(),
            Fila: $("#txtfilas").val(),
            Columna: $("#txtcolumnas").val(),
            Marca: $("#txtMarca").val()
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var messageComplete = data.trim();
            var typeOfMessage = messageComplete.substring(0, 2);
            var responseText = messageComplete.substring(2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormAvion();
                Array.prototype.slice.call(forms).forEach(function (form) {
                    form.classList.remove('was-validated');
                });
                $("#dt_Avion").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }

            if ($("#typeAction").val() === "update_Avion") {
                btn_mod(0);
            }
        },
        type: 'POST'
    });
}

function clearFormAvion() {
    $('#form_Avion').trigger("reset");
}

var choise = 0;
function btn_mod(choise) {
    if (choise === 0) {
        $("#enviar_Avion").show();
        $("#modif_Avion").hide();
        $("#txtidAvion").show();
        $("#txtidAvionRO").hide();
        $("#txtfilas").replaceWith('<select  class="form-select" id="txtfilas" required><option>5</option><option>10</option></select>');
        $("#txtcolumnas").replaceWith('<select  class="form-select" id="txtcolumnas" required><option>6</option><option>9</option></select>');
        $("#typeAction").val("add_Avion");
    }
    if (choise === 1) {
        $("#enviar_Avion").hide();
        $("#modif_Avion").show();
        $("#txtidAvion").hide();
        $("#txtidAvionRO").show();
        $("#typeAction").val("update_Avion");
    }
}

function showAvionByID(idAvion) {
    //Se envia la información por ajax
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/AvionController.php',
        data: {
            action: "show_Avion",
            idAvion: idAvion
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) {
            var objAvionJSon = JSON.parse(data);
            $("#txtidAvion").val(objAvionJSon.idAvion);
            $("#txtidAvionRO").val(objAvionJSon.idAvion);
            $("#txtAnio").val(objAvionJSon.Anio);
            $("#txtModelo").val(objAvionJSon.Modelo);
            $("#txtMarca").val(objAvionJSon.Marca);
            $("#typeAction").val("update_Avion");
            $("#txtfilas").replaceWith('<select  class="form-select" id="txtfilas" readonly><option selected>' + objAvionJSon.Filas + '</option></select>');
            $("#txtcolumnas").replaceWith('<select  class="form-select" id="txtcolumnas" readonly><option selected>' + objAvionJSon.Columnas + '</option></select>');
            btn_mod(1);

            swal("Confirmacion", "Los datos del Avión fueron cargados correctamente", "success");

        },
        type: 'POST'
    });
}

function deleteAvionByID(datos) {
    //Se envia la información por ajax
    var datos_split = datos.split(",");
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/AvionController.php',
        data: {
            action: "delete_Avion",
            idAvion: datos_split[0],
            filas: datos_split[1],
            columnas: datos_split[2]
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormAvion();
                $("#dt_Avion").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}

//****************************************************//
//*        APARTADO RUTA ADMINISTRACION              *//
//****************************************************//

function addOrUpdateRuta() {
    //Se envia la información por ajax
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/RutaController.php',
        data: {
            action: $("#typeAction2").val(),
            idRuta_de_vuelo: $("#txtidRuta").val(),
            idAvion: $("#SelectidAvion").val(),
            idHorario: $("#SelectidHorario").val(),
            Origen: $("#txtOrigen").val(),
            Destino: $("#txtDestino").val(),
            subTotal: $("#txtsubTotal").val(),
            Activo: $("#RdbActivo").val(),
            Descuento: $("#txtDescuento").val()
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var messageComplete = data.trim();
            var typeOfMessage = messageComplete.substring(0, 2);
            var responseText = messageComplete.substring(2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormRuta();
                Array.prototype.slice.call(forms).forEach(function (form) {
                    form.classList.remove('was-validated');
                });
                $("#dt_Ruta").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }

            if ($("#typeAction2").val() === "update_Ruta") {
                btn_ruta(0);
            }
        },
        type: 'POST'
    });
}

function clearFormRuta() {
    $('#form_Ruta').trigger("reset");
}

var op = 0;
function btn_ruta(op) {
    if (op === 0) {
        $("#enviar_Ruta").show();
        $("#modif_Ruta").hide();
        $("#txtidRuta").show();
        $("#txtidRutaRO").hide();
    }
    if (op === 1) {
        $("#enviar_Ruta").hide();
        $("#modif_Ruta").show();
        $("#txtidRuta").hide();
        $("#txtidRutaRO").show();
    }
}

function showRutaByID(idRuta_de_vuelo) {
    //Se envia la información por ajax
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/RutaController.php',
        data: {
            action: "show_Ruta",
            idRuta_de_vuelo: idRuta_de_vuelo
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) {
            var objRutaJSon = JSON.parse(data);
            $("#txtidRuta").val(objRutaJSon.idRuta_de_vuelo);
            $("#txtidRutaRO").val(objRutaJSon.idRuta_de_vuelo);
            $("#SelectidAvion").val(objRutaJSon.Avion);
            $("#SelectidHorario").val(objRutaJSon.Horario);
            $("#txtOrigen").val(objRutaJSon.Origen);
            $("#txtDestino").val(objRutaJSon.Destino);
            $("#txtDescuento").val(objRutaJSon.Descuento);
            $("#txtsubTotal").val(objRutaJSon.subTotal);
            $("#typeAction2").val("update_Ruta");
            selecionRdb(objRutaJSon.Activo);
            btn_ruta(1);

            swal("Confirmacion", "Los datos de la ruta fueron cargados correctamente", "success");

        },
        type: 'POST'
    });
}

function selecionRdb(rdb) {
    if (rdb === 1) {
        $("#RdbActivo").replaceWith("<input type='radio' id='RdbActivo' name='Selection' value= 'True' required checked> ");
        $("#RdbDesactivo").replaceWith("<input type='radio' id='RdbActivo' name='Selection' value= 'True'  required>");
    } else {
        $("#RdbDesactivo").replaceWith("<input type='radio' id='RdbActivo' name='Selection' value= 'True'  required checked>");
        $("#RdbActivo").replaceWith("<input type='radio' id='RdbActivo' name='Selection' value= 'True'  required>");
    }
    ;
}
function deleteRutaByID(idRuta_de_vuelo) {
    //Se envia la información por ajax
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/RutaController.php',
        data: {
            action: "delete_Ruta",
            idRuta_de_vuelo: idRuta_de_vuelo
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormRuta();
                $("#dt_Ruta").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}

function poblar_selects() {
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/AvionController.php',
        data: {
            action: "showAll_idAvion"
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al mostrar la informacion en el select idAvión", "error");
        },
        success: function (data) {
            var objRutaJSonA = JSON.parse(data);
            var cadenaA = "";
            if (objRutaJSonA.data.length > 0) {
                for (var i = 0; i < objRutaJSonA.data.length; i++) {
                    cadenaA += "<option value='" + objRutaJSonA.data[i].idAvion + "'>" + objRutaJSonA.data[i].idAvion + "</option>";
                }
                $("#SelectidAvion").html(cadenaA);
            } else {
                cadenaA += "<option value=''> No se encontraron registros</option>";
                $("#SelectidAvion").html(cadenaA);
            }

            //swal("Confirmacion", "Los datos de la ruta fueron cargados correctamente", "success");

        },
        type: 'POST'
    });

    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/horarioController.php',
        data: {
            action: "showAll_idHorario"
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al mostrar la informacion en el select idHorario", "error");
        },
        success: function (data) {
            var objRutaJSonH = JSON.parse(data);
            var cadenaH = "";
            if (objRutaJSonH.data.length > 0) {
                for (var i = 0; i < objRutaJSonH.data.length; i++) {
                    cadenaH += "<option value='" + objRutaJSonH.data[i].idHorario + "'>" + objRutaJSonH.data[i].idHorario + "</option>";
                }
                $("#SelectidHorario").html(cadenaH);
            } else {
                cadenaH += "<option value=''> No se encontraron registros</option>";
                $("#SelectidHorario").html(cadenaH);
            }
        },
        type: 'POST'
    });
}

// **************************************************
// *        APARTADO DE TABLAS                      *
// **************************************************

function cargarTablas() {

    var dataTableUsuarios_const = function () {
        if ($("#dt_usuario").length) {
            $("#dt_usuario").DataTable({
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
                            obtener_usuario_de_sesion();
                            if (row[0] === user) {
                                var botones = '<button type="button" class="btn btn-danger" aria-label="Left Align" disabled onclick="">Eliminar</button> ';
                            } else if (row[0] !== user && row[6] === '0') {
                                var botones = '<button type="button" class="btn btn-danger" aria-label="Left Align" onclick="deleteUsuarioByID(\'' + row[0] + '\')">Eliminar</button> ';
                                botones += '<button type="button" class="btn btn-primary BustButton" aria-label="Left Align" onclick="giveAdmin(\'' + row[0] + '\')">Dar Permisos</button>';
                            } else if (row[0] !== user && row[6] === '1') {
                                var botones = '<button type="button" class="btn btn-danger" aria-label="Left Align" disabled onclick="">Eliminar</button> ';
                                botones += '<button type="button" class="btn btn-primary BustButton" aria-label="Left Align" onclick="deleteAdmin(\'' + row[0] + '\')">Quitar Permisos</button>';
                            }
                            return botones;
                        }
                    }

                ],
                pageLength: 5,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: 'http://localhost/ProyectoProgramacionv5/backend/controller/usuarioController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_usuario"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_usuario').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };

    var dataTableHorarios_const = function () {
        if ($("#dt_horarios").length) {
            $("#dt_horarios").DataTable({
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
                        targets: 3,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-danger" aria-label="Left Align" onclick="deleteHorarioByID(\'' + row[0] + '\')">Eliminar</button>';
                            botones += '<button type="button" class="btn btn-primary BustButton" aria-label="Left Align" onclick="show_info_horario(\'' + row[0] + '\')">Modificar</button>';
                            return botones;
                        }
                    }

                ],
                pageLength: 5,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: 'http://localhost/ProyectoProgramacionv5/backend/controller/horarioController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_horario"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_horarios').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };

    var dataTableAvion_const = function () {
        if ($("#dt_Avion").length) {
            $("#dt_Avion").DataTable({
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
                        targets: 8,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-primary BustButton" aria-label="Left Align" onclick="showAvionByID(\'' + row[0] + '\');">Modificar</button> ';
                            botones += '<button type="button" class="btn btn-danger" aria-label="Left Align" onclick="deleteAvionByID(\'' + row[0] + ',' + row[4] + ',' + row[5] + '\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                pageLength: 5,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: 'http://localhost/ProyectoProgramacionv5/backend/controller/AvionController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_Avion"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_Avion').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };

    var dataTableRuta_const = function () {
        if ($("#dt_Ruta").length) {
            $("#dt_Ruta").DataTable({
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
                        targets: 9,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-primary BustButton" aria-label="Left Align" onclick="showRutaByID(\'' + row[0] + '\');">Modificar</button> ';
                            botones += '<button type="button" class="btn btn-danger" aria-label="Left Align" onclick="deleteRutaByID(\'' + row[0] + '\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                pageLength: 5,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: 'http://localhost/ProyectoProgramacionv5/backend/controller/RutaController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_Ruta"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_Ruta').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };

    var dataTableViajes_const = function () {
        if ($("#dt_viajes").length) {
            $("#dt_viajes").DataTable({
                dom: "Bfrtip",
                bFilter: true,
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
                        targets: 5,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
//                            var botones = '<button type="button" class="btn btn-primary" aria-label="Left Align" disabled onclick="">Ver Boletos</button> ';
                            var botones = "";
                            return botones;
                        }
                    }

                ],
                pageLength: 5,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: 'http://localhost/ProyectoProgramacionv5/backend/controller/reservacionController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "show_reservationif"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_viajes').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };

    var dataTableReserv_const = function () {
        if ($("#dt_reserv").length) {
            $("#dt_reserv").DataTable({
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
                        targets: 5,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            if (row[4] === '1') {
                                var botones = '<button type="button" class="btn btn-primary BustButton" aria-label="Left Align" disabled>Check In</button> ';
                            } else {
                                var botones = '<button type="button" class="btn btn-primary BustButton" aria-label="Left Align" onclick="showInfoCheckIn(\'' + row[0] + '\')">Check In</button> ';
                            }
                            return botones;
                        }
                    }

                ],
                pageLength: 5,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: 'http://localhost/ProyectoProgramacionv5/backend/controller/reservacionController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "show_reservation"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_reserv').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };


    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTableUsuarios_const();
                dataTableHorarios_const();
                dataTableAvion_const();
                dataTableRuta_const();
                dataTableViajes_const();
                dataTableReserv_const();
                $(".dataTables_filter input").addClass("form-control input-rounded ml-sm");
            }
        };
    }();

    TableManageButtons.init();

}


//********************************** Seccción Check-In **************************************//


var num_pasajeros_total = 0;
var avion_del_viaje = "";
var reservacion_trabajada = 0;
function num_pasajeros(num) {
    num_pasajeros_total = num;
}
function showInfoCheckIn(idReservacion) {
    change_estado_perfil_opciones(4);
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/reservacionController.php',
        data: {
            action: "show_reservationID",
            idReservacion: idReservacion
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion 1", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var jsonObject = JSON.parse(data);
            $("#num_pasajerosTXT").replaceWith('<label id="num_pasajerosTXT">' + jsonObject.NumeroPasajeros + '</label>');
            $("#PrecioCheckInTXT").replaceWith('<label id="PrecioCheckInTXT">' + "$" + jsonObject.PrecioTotal + '</label>');
            showFlyRouteInfoCheckIn(jsonObject.Ruta_de_vuelo);
            showUserInfoCheckIn();
            num_pasajeros(jsonObject.NumeroPasajeros);
            reservacion_trabajada = jsonObject.idReservacion;
        },
        type: 'POST'
    });
}

function showFlyRouteInfoCheckIn(idRuta) {
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/RutaController.php',
        data: {
            action: "show_Ruta",
            idRuta_de_vuelo: idRuta
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion 1", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var jsonObject = JSON.parse(data);
            $("#OrigenTXT").replaceWith('<label id="OrigenTXT">' + jsonObject.Origen + '</label>');
            $("#DestinoTXT").replaceWith('<label id="DestinoTXT">' + jsonObject.Destino + '</label>');
            showPlaneInfoCheckIn(jsonObject.idAvion);
            showScheduleInfoCheckIn(jsonObject.idHorario);
        },
        type: 'POST'
    });
}

function showPlaneInfoCheckIn(idAvion) {
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/AvionController.php',
        data: {
            action: "show_Avion",
            idAvion: idAvion
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion 1", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var jsonObject = JSON.parse(data);
            $("#idAvionTXTCheckIn").replaceWith('<label id="idAvionTXTCheckIn">' + jsonObject.idAvion + '</label>');
            createAsientos(jsonObject.Filas, jsonObject.Columnas, jsonObject.idAvion);
            avion_del_viaje = jsonObject.idAvion;
        },
        type: 'POST'
    });
}

var asientos_seleccionados = '';
function add_asiento(Asiento) {
    var asiento_num = Asiento;
    var asientos_vector = asientos_seleccionados.split(" ");
    var validacion = true;
    for (var i = 0; i < asientos_vector.length; i++) {
        if (asientos_vector[i] === Asiento) {
            validacion = false;
        }
    }
    if (validacion !== false) {
        asientos_seleccionados += asiento_num + " ";
        $("#AsientosCheckInCount").replaceWith('<label id="AsientosCheckInCount" style="margin-right: 10%">' + asientos_seleccionados + '</label>');
    } else {
        swal("Advertencia", "Ya has seleccionado este asiento.", "warning");
    }
}

function restablecer() {
    asientos_seleccionados = '';
    $("#AsientosCheckInCount").replaceWith('<label id="AsientosCheckInCount" style="margin-right: 10%">' + asientos_seleccionados + '</label>');

}

function reinicializar_todo() {
    window.location.reload();
}


function verificar_num_pasajeros(num) {
    var asientos_vector = asientos_seleccionados.split(" ");
    var validacion = false;
    var num_comparacion = ((asientos_vector.length)-- - 1);
    if (num_comparacion == (num)) {
        validacion = true;
    } else {
        validacion = false;
    }
    return validacion;
}

function aceptar_checkIn() {
    if (num_pasajeros_total > 0) {
        if (verificar_num_pasajeros(num_pasajeros_total) === true) {
            var asientos_vector = asientos_seleccionados.split(" ");
            var numero_asientos = num_pasajeros_total;
            for (var i = 0; i < asientos_vector.length; i++) {
                update_Asientos(asientos_vector[i]);
            }
            update_check_in_realizado();
            reinicializar_todo();
        } else {
            swal("Advertencia", "Debes seleccionar el número de asientos que corresponde al número de pasajeros.", "warning");
        }
    } else {
        swal("Error", "El número de pasajeros no ha sido inicializado", "error");
    }

}

function update_check_in_realizado() {
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/reservacionController.php',
        data: {
            action: "update_reservationID",
            idReservacion: reservacion_trabajada
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
        },
        type: 'POST'
    });
}

function update_Asientos(asiento) {
    alert(asiento + " " + avion_del_viaje);
    var idAsiento = asiento + " " + avion_del_viaje;
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/AvionController.php',
        data: {
            action: "update_asiento",
            idAsiento: idAsiento,
            reservacion: reservacion_trabajada
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
        },
        type: 'POST'
    });

}


function createAsientos(filas, columnas, idAvion) {
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/AvionController.php',
        data: {
            action: "showAll_Asientos"
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion 1", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var jsonObject = JSON.parse(data);
            var fila = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
            var num_asiento = 0;
            var htmlcodigo = '';
            for (var i = 0; i < filas; i++) {
                num_asiento = 0;
                for (var j = 0; j < columnas; j++) {
                    var id = fila[i] + num_asiento + " " + idAvion;
                    for (var k = 0; k < jsonObject.data.length; k++) {
                        if (id === jsonObject.data[k].Nombre_Asiento) {
                            var asiento = fila[i] + num_asiento;
                            if (jsonObject.data[k].Reservado === '1') {
                                htmlcodigo += '<span class="AsientoBlock BtnBustLabel" id="' + asiento + 'BTN">' + fila[i] + num_asiento + '</span>';
                            } else {
                                htmlcodigo += '<span class="AsientoContainer BtnBustLabel" id="' + asiento + 'BTN" onclick="add_asiento(\'' + asiento + '\')">' + fila[i] + num_asiento + '</span>';
                            }
                        }
                    }
                    num_asiento++;
                }
                htmlcodigo += '<br><br><br>';
            }
            $("#AsientoContainer").html(htmlcodigo);

        },
        type: 'POST'
    });
}


function showScheduleInfoCheckIn(idHorario) {
    $.ajax({
        url: 'http://localhost/ProyectoProgramacionv5/backend/controller/horarioController.php',
        data: {
            action: "show_info",
            horarioPK: idHorario
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion 1", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var jsonObject = JSON.parse(data);
            var salida_date = jsonObject.Salida.substring(0, 10);
            $("#HorarioCheckInTXT").replaceWith('<label id="HorarioCheckInTXT">' + jsonObject.Salida + '</label>');
        },
        type: 'POST'
    });
}

function showUserInfoCheckIn() {
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
            var objPersonasJSon = JSON.parse(data);
            var typeOfMessage = messageComplete.substring(0, 2);
            var responseText = messageComplete.substring(2);
            var nombre = objPersonasJSon.data[1] + " " + objPersonasJSon.data[2] + " " + objPersonasJSon.data[3];
            $("#NombreCheckInTXT").replaceWith('<label id="NombreCheckInTXT">' + nombre + '</label>');
        },
        type: 'POST'
    });
}