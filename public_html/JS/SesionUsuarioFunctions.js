$(document).ready(function () {
    showmap(0);
});

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#registraseBtn").click(function () {
        addUsuario();
    });
    
    $("#IniciarSessionBtn").click(function () {
        iniciarSesion();
    });
    $("#txtDireccion").click(function(){
        showmap(1);
    });
//    $("#btndireccion").click(function(){
//        showmap(0);
//    });
});


var sessionOptionState=0;
verify_SessionStateoption();
function verify_SessionStateoption(){
    $("#iniciar_sesionForm").hide();
    $("#registrarseForm").hide();
    $("#registrarseOptionBtn").hide();
    $("#IniciarSesionTittle").hide();
    $("#RegistrarseTittle").hide();
    $("#IniciarSesionOptionBtn").hide();
    if(sessionOptionState===0){
        $("#iniciar_sesionForm").show();
        $("#registrarseOptionBtn").show();
        $("#IniciarSesionTittle").show();
    }else if(sessionOptionState===1){
        $("#registrarseForm").show();
        $("#RegistrarseTittle").show();
        $("#IniciarSesionOptionBtn").show();
    }
}

function change_sessionOptionState(option){
    if(option===0){
        sessionOptionState=0;
    }else if(option===1){
        sessionOptionState=1;
    }
    verify_SessionStateoption();
}

function addUsuario() {
    //Se envia la información por ajax    
        if (validar_contrasenas()) {
//            var direccion = $("#txtpais").val() + "," + $("#txtprovincia").val() + "," + $("#txtcanton").val();
            var rol = false;
            $.ajax({
                url: 'http://localhost/ProyectoProgramacionv5/backend/controller/usuarioController.php',
                data: {
                    action: $("#typeAction").val(),
                    PK_User: $("#PK_User").val(),
                    nombre: $("#txtnombre").val(),
                    apellido1: $("#txtapellido1").val(),
                    apellido2: $("#txtapellido2").val(),
                    correoElectronico: $("#txtCorreo").val(),
                    fecNacimiento: $("#txtfecNacimiento").val(),
                    celular: $("#txtcelular").val(),
                    celularOficina: $("#txtcelularOficina").val(),
                    contrasegna: $("#txtcontrasegna").val(),
                    direccion: $("#txtDireccion").val()
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
                        clearFormRegistro();
                        change_state(0);
                        //$("#dt_personas").DataTable().ajax.reload();
                    } else {//existe un error
                        swal("Error", responseText, "error");
                    }
                },
                type: 'POST'
            });
        } else {
            swal("Error de validación", "Las contraseñas no coinciden", "error");
        }

}

function clearFormRegistro() {
    $('#registrarseForm').trigger("reset");
    change_sessionOptionState(0);
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.classList.add('was-validated');
    });
}

$(function () {
    $('#date-picker #txtfecNacimiento').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
    });
});

function validar_contrasenas() {
    var validacion = true;
    var contrasena1 = $("#txtcontrasegna").val();
    var contrasena2 = $("#txtvalidarContrasegna").val();
    if (contrasena1 !== contrasena2) {
        validacion = false;
    }
    return validacion;
}

function iniciarSesion() {
    //Se envia la información por ajax    
    if (validar_sesion()) {
            $.ajax({
                url: 'http://localhost/ProyectoProgramacionv5/backend/controller/usuarioController.php',
                data: {
                    action: $("#typeActioninit").val(),
                    PK_Init_User: $("#initUsername").val(),
                    contrasegna: $("#initPassword").val()
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
                        //$("#dt_personas").DataTable().ajax.reload();
                    } else {//existe un error
                        swal("Error", responseText, "error");
                    }
                },
                type: 'POST'
            });

    } else {
        swal("Error de validación", "Debes ingresar un usuario y una contraseña.", "error");
    }
}

function validar_sesion(){
    var validacion = true;
    
    if($("#initUsername").val()===""){
        validacion = false;
    }
    
    if($("#initPassword").val()===""){
       validacion = false; 
    }
    return validacion;
}

//var show = 0;
//function Showmap(show){
//    if (show===1){
//        $("#cont-map").show();
//    }else if (show===0) {
//        $("#cont-map").hide();
//    }
//}