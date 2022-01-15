<?php ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Perfil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Ephesis&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">

        <link rel="stylesheet" type="text/css" href="CSS/jquery-ui.min.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/jquery-ui.structure.min.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/jquery-ui.theme.min.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/bootstrap-datepicker.css">
        <link href="CSS/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="CSS/styles.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/principalStyles.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/perfilStyles.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/sidebars.css"/>

        <script src="JS/jquery.min.js"></script>
        <link href="lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
        <script src="lib/jquery/dist/jquery.min.js" type="text/javascript"></script>

        <link href="lib/dataTableFull/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="lib/dataTableFull/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="lib/dataTableFull/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="lib/dataTableFull/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="lib/dataTableFull/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="lib/dataTableFull/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

        <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
        <link href="lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>

        <script src="js/utils.js" type="text/javascript"></script>
    </head>
    <body>
        <!-- Menú -->
        <div style="width: 100%; height: fit-content; background-color:#EFFBF8;" class="sticky-top">
            <div style="margin-left: 2%; margin-right: 2%; background-color:#EFFBF8;" class="sticky-top">
                <nav class="navbar navbar-expand-xl navbar-light sticky-top" style="background-color:#EFFBF8;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="Principal.php"><div class="fitImage"></div></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item navOption">
                                    <a class="nav-link active" aria-current="page" href="#">Viajes</a>
                                </li>
                                <li class="nav-item navOption">
                                    <a class="nav-link" href="#">Descuentos</a>
                                </li>
                                <li class="nav-item dropdown navOption">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Soporte
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="Contactenos.php">Contactenos</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="d-flex">
                                <nav id="navCuentaIniciada">
                                    <div class="nav-item dropdown">
                                        <button class="nav-item dropdown-toggle btn ButtonS1"role="button" data-bs-toggle="dropdown">
                                            <label id="UsuarioBtnText">Usuario</label>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                                            <li><a class="dropdown-item" href="#">Carrito de Compras</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="#" onclick="close_session()">Cerrar Sesión</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="division"></div>
        <!-- Menú -->

        <!-- insertar nuevo menú responsivo aquí -->
        <div class="ContainerPerfilPrincipal row">
            <div class="ContainerPerfilOpciones col-2">
                <div class="vertical_width">
                    <h3 id="UserProfileOption">Usuario</h3>
                    <div class="division2"></div>
                    <div>
                        <button type="Button" class="BTNPerfilOpcion" onclick="change_estado_perfil_opciones(0)">Mi Información</button>
                        <button type="Button" class="BTNPerfilOpcion" onclick="change_estado_perfil_opciones(1)">Mis Viajes</button>
                        <button type="Button" class="BTNPerfilOpcion" onclick="change_estado_perfil_opciones(2)">Mis Reservaciones</button>
                        <button type="Button" class="BTNPerfilOpcion" id="AdminPerfilOption" onclick="change_estado_perfil_opciones(3)">Administración</button>
                    </div>
                </div>
            </div>



            <!-- Información del Perfil -->
            <div class="col-2 ContainerPerfilContenido">

                <!-- Información del Perfil -->
                <div id="seccionInformacion">
                    <div id="perfilOpcionMiInformacion">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <button class="nav-link active BustLabel" aria-current="page" onclick="change_estado_informacion_perfil(0)">Mi Información</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_informacion_perfil(1)">Editar Información</button>
                            </li>
                        </ul>
                        <div>

                            <div class="ContainerPerfilInformacion">
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <label >Nombre:</label>
                                        <label class=" FontRespuesta" id="infNamePerfil">Respuesta</label>
                                    </div>
                                    <div class="col-5">
                                        <label >Apellidos:</label>
                                        <span>
                                            <label class="FontRespuesta" align="right" id="infLastName1Perfil">Respuesta</label>
                                        </span>
                                        <span>
                                            <label class="FontRespuesta" align="right" id="infLastName2Perfil">Respuesta2</label>
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <label>Correo Electrónico:</label>
                                        <label class="FontRespuesta" id="infCorreoPerfil">Respuesta</label>
                                    </div>
                                    <div class="col-5">
                                        <label >Dirección:</label>
                                        <label class="FontRespuesta" align="center" id="infDireccionPerfil">Respuesta</label>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <label>Celular:</label>
                                        <label class="FontRespuesta" id="infCelularPerfil">Respuesta</label>
                                    </div>
                                    <div class="col-5">
                                        <label>Celular de Oficina:</label>
                                        <label class="FontRespuesta" align="center" id="infCelilarOficinaPerfil">Respuesta</label>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <label>Fecha de Nacimiento:</label>
                                        <label class="FontRespuesta" id="infFechNacimientoPerfil">Respuesta</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div id="perfilOpcionEditarInformacion">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_informacion_perfil(0)">Mi Información</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link active BustLabel" aria-current="page" onclick="change_estado_informacion_perfil(1)">Editar Información</button>
                            </li>
                        </ul>
                        <div>
                            <form role="form" id="editarInformacionPerfil" onsubmit="return false;" class="row g-3 needs-validation" novalidate action="../backend/controller/usuarioController.php">

                                <div class="col-md-4 form-group">
                                    <label for="update_nombre" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="update_nombre" required>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="update_apellido1" class="form-label">Primer Apellido:</label>
                                    <input type="text" class="form-control" id="update_apellido1" required>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="update_apellido2" class="form-label">Segundo Apellido:</label>
                                    <input type="text" class="form-control" id="update_apellido2" required>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="update_user" class="form-label">Usuario:</label>
                                    <input type="text" readonly="" class="form-control" id="update_user" required>
                                </div>

                                <div class="col-8 form-group">
                                    <label for="update_email" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="update_email" aria-describedby="update_email" required>
                                    <div class="invalid-feedback">
                                        Por favor ingrese un correo electrónico.
                                    </div>
                                </div>

                                <div id="date-picker" class="col-4 form-group">
                                    <div id="FechaNacimiento">
                                        <label for="update_fechaN" class="form-label">Fecha de Nacimiento:</label>
                                        <input class="form-control" type="text" autocomplete="off" id="update_fechaN" placeholder="yyyy-mm-dd" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor ingrese su fecha de nacimiento.
                                    </div>
                                </div>

                                <div class="col-4 form-group">
                                    <label for="update_celular" class="form-label">Telefono Celular:</label>
                                    <input class="form-control" type="text" autocomplete="off" id="update_celular" placeholder="(+506)9999-9999" required>
                                    <div class="invalid-feedback">
                                        Por favor ingrese su número celular.
                                    </div>
                                </div>

                                <div class="col-4 form-group">
                                    <label for="update_celularOficina" class="form-label">Telefono de Oficina:</label>
                                    <input class="form-control" type="text" autocomplete="off" id="update_celularOficina" placeholder="(Opcional)">
                                </div>

                                <div class="form-group">
                                    <input type="hidden" id="typeAction1" value="update_usuario" />
                                    <input type="hidden" id="txtrol" value="False" />
                                    <div class="col-12 margin_1" style="width: 50%; margin-top: 10px;">
                                        <button class="BtnModificarPerfil" style="width: 100%; margin-bottom: 2%;" id="modificarPerfilBtn" type="submit">Modificar</button>
                                        <button class="CancelBtnPerfil" style="width: 100%" type="button" onclick="change_estado_informacion_perfil(0)">Cancelar</button>
                                    </div>
                                </div>
                            </form>   
                        </div>

                    </div>
                </div>
                <!-- Información del Perfil -->

                <!-- Seccion Mis Viajes -->
                <div id="seccionMisViajes">
                    <h3>Mis viajes</h3>
                    <br>
                    <div class="division"></div>
                    <br>
                    <table id="dt_viajes"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID Reservación</th>
                                <th>Fecha de Reservación</th>
                                <th>Ruta de Vuelo</th>
                                <th>Hora de Check In</th>
                                <th>Check In Realizado</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                    </table>

                </div>
                <!-- Seccion Mis Viajes -->


                <!-- Seccion Mis Reservaciones -->
                <div id="seccionMisReservaciones">
                    <h3>Mis Reservaciones</h3>
                    <br>
                    <div class="division"></div>
                    <br>
                    <table id="dt_reserv"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID Reservación</th>
                                <th>Fecha de Reservación</th>
                                <th>Ruta de Vuelo</th>
                                <th>Hora de Check In</th>
                                <th>Check In Realizado</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                    </table>

                </div>
                <!-- Seccion Mis Reservaciones -->

                <!-- Formulario Check In -->
                <div id="form_check_in" class="BustLabel">
                    <h3>Check-In</h3>
                    <br>
                    <div class="division"></div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <label>Nombre: </label>                    
                        </div>
                        <div class="col-4">
                            <label id="NombreCheckInTXT">Respuesta</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Origen: </label>                    
                        </div>
                        <div class="col-4">
                            <label id="OrigenTXT">Respuesta</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Destino: </label>                    
                        </div>
                        <div class="col-4">
                            <label id="DestinoTXT">Respuesta</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Avion: </label>                    
                        </div>
                        <div class="col-4">
                            <label id="idAvionTXTCheckIn">Respuesta</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Número de Pasajeros: </label>                    
                        </div>
                        <div class="col-4">
                            <label id="num_pasajerosTXT">Respuesta</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Fecha y Hora de salida: </label>                    
                        </div>
                        <div class="col-4">
                            <label id="HorarioCheckInTXT">Respuesta</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label>Precio: </label>                    
                        </div>
                        <div class="col-4">
                            <label id="PrecioCheckInTXT">Respuesta</label>
                        </div>
                    </div>
                    <br>
                    <div class="division"></div>
                    <br>
                    <h3>Elija sus Asientos</h3>
                    <br>
                    <div class="ContainerExteriorAsiento" id="AsientoContainer">
<!--                        <span class="AsientoBlock BtnBustLabel">E1</span>-->
                    </div>
                    <div class="division"></div>
                    <br>
                    <div align="center">
                        <label style="margin-right: 10%;">Asientos Seleccionados:</label>
                        <label id="AsientosCheckInCount" style="margin-right: 10%">Asientos...</label>
                        <button type="button" id="restablecerAsientosSeleccionados" class="BtnBustLabel BustButton" onclick="restablecer()">Restablecer</button>
                    </div>
                    <br>
                    <div class="division"></div>
                    <br>
                    <div style="width: 70%; margin: auto;">
                        <button type="button" class="BtnBustLabel BustButton" style="width: 100%" id="BTnAcepatarCheckIN" onclick="aceptar_checkIn()">Aceptar</button>

                        <button type="button" class="btn btn-danger" style="width: 100%; margin-top: 10px;" id="BTnCancelarCheckIN" onclick="change_estado_perfil_opciones(2)">Cancelar</button>
                    </div>
                    <br>
                </div>
                <br>
                <!-- Formulario Check In -->


                <!-- Seccion Administracion -->
                <div id="seccionAdministracion">
                    <div id="perfilOpcionModificarUsuario">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <button class="nav-link active BustLabel" aria-current="page" onclick="change_estado_opcion_administracion(0)">Usuarios</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_opcion_administracion(1)">Horarios</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_opcion_administracion(2)">Aviones</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_opcion_administracion(3)">Rutas de Viaje</button>
                            </li>
                        </ul>
                        <br>
                        <div>
                            <table id="dt_usuario"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr class="BustLabel">
                                        <th>USUARIO</th>
                                        <th>NOMBRE</th>
                                        <th>APELLIDO 1</th>
                                        <th>APELLIDO 2</th>
                                        <th>FEC. NACIMIENTO</th>
                                        <th>FEC. REGISTRO</th>
                                        <th>ROL</th>
                                        <th>ACCION</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <div id="perfilOpcionModificarHorario">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_opcion_administracion(0)">Usuarios</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link active BustLabel" aria-current="page" onclick="change_estado_opcion_administracion(1)">Horarios</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_opcion_administracion(2)">Aviones</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_opcion_administracion(3)">Rutas de Viaje</button>
                            </li>
                        </ul>
                        <div>
                            <br><br>
                            <form role="form" id="form_addHorario" onsubmit="return false;" class="needs-validation" 
                                  novalidate action="../backend/controller/horarioController.php" align="center">
                                <div align="center">
                                    <div class="col-md-3 form-group BustLabel" id="divIdHorario">
                                        <label for="addCheckIn" class="form-label">ID:</label>
                                        <input type="text" class="form-control" id="idhorario" required placeholder="id">
                                    </div>
                                </div>
                                <br>
                                <div id="date-picker">
                                    <div class="row">
                                        <div class="col-md-3 form-group BustLabel">
                                            <label for="addSalida" class="form-label">Fecha Salida:</label>
                                            <input type="text" class="form-select"id="addSalida" required placeholder="Seleccione una fecha">
                                        </div>

                                        <div class="col-md-3 form-group BustLabel">
                                            <label for="addSalidaH" class="form-label">Hora Salida:</label>
                                            <input type="time" class="form-select" id="addSalidaH" required>
                                        </div>

                                        <div class="col-md-3 form-group BustLabel">
                                            <label for="addArrivo" class="form-label">Fecha Arrivo:</label>
                                            <input type="text" class="form-select" id="addArrivo" required placeholder="Seleccione una fecha">
                                        </div>

                                        <div class="col-md-3 form-group BustLabel">
                                            <label for="addArrivo" class="form-label">Hora Arrivo:</label>
                                            <input type="time" class="form-select" id="addArrivoH" required>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="Division"></div>
                            <div class="Container_BTN">
                                <button id="addHorariobtn" type="button" class="btn btn-primary BustButton">Agregar Horario</button>
                                <button id="modifyHorariobtn" type="button" class="btn btn-primary BustButton">Modificar Horario</button>
                                <button id="canceladdHorario" type="button" class="btn btn-danger">Cancelar</button>
                            </div>
                            <div class="Division"></div>

                            <div class="row">
                                <div class="col-md-12">
                                    <table id="dt_horarios"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="BustLabel">ID</th>
                                                <th>Salida</th>
                                                <th>Arrivo</th>
                                                <th>ACCION</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="perfilOpcionModificarAviones">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_opcion_administracion(0)">Usuarios</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_opcion_administracion(1)">Horarios</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link active BustLabel" aria-current="page" onclick="change_estado_opcion_administracion(2)">Aviones</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_opcion_administracion(3)">Rutas de Viaje</button>
                            </li>
                        </ul>

                        <br>
                        <h4 align="Left" class="BustLabel">
                            Agregar Avión
                        </h4>
                        <div class="Division"></div>
                        <div class="Container_26">
                            <!-- Formulario Avión -->                       
                            <div>
                                <div>

                                    <form role="form" id="form_Avion" onsubmit="return false;" class="row g-3 needs-validation" novalidate action="../backend/controller/AvionController.php">

                                        <div class="col-md-4 form-group BustLabel">
                                            <label for="txtidAvion" class="form-label">ID Avión:</label>
                                            <input type="text" class="form-control" id="txtidAvion" required>
                                            <input type="text" class="form-control" id="txtidAvionRO" readonly>
                                            <div class="valid-feedback">
                                                ✔️ Parece bien!
                                            </div>
                                            <div class="invalid-feedback">
                                                ❌ Debe digitar un ID de avión válido.
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group BustLabel">
                                            <label for="txtAnio" class="form-label">Año:</label>
                                            <input type="text" class="form-control" id="txtAnio" required>
                                            <div class="valid-feedback">
                                                ✔️ Parece bien!
                                            </div>
                                            <div class="invalid-feedback">
                                                ❌ Debe digitar el Año del modelo.
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group BustLabel">
                                            <label for="txtModelo" class="form-label">Modelo:</label>
                                            <input type="text" class="form-control" id="txtModelo" required>
                                            <div class="valid-feedback">
                                                ✔️ Parece bien!
                                            </div>
                                            <div class="invalid-feedback">
                                                ❌ Debe digitar el modelo.
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group BustLabel" align="center">
                                            <label for="txtMarca" class="form-label">Marca:</label>
                                            <input type="text" class="form-control" id="txtMarca" required>
                                            <div class="valid-feedback">
                                                ✔️ Parece bien!
                                            </div>
                                            <div class="invalid-feedback">
                                                ❌ Debe digitar la marca del avión.
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group BustLabel" align="center">
                                            <label for="txtfilas" class="form-label">Filas de Asientos:</label>
                                            <select  class="form-select" id="txtfilas" required>
                                                <option>
                                                    5
                                                </option>
                                                <option>
                                                    10
                                                </option>
                                            </select>
                                            <div class="valid-feedback">
                                                ✔️ Parece bien!
                                            </div>
                                            <div class="invalid-feedback">
                                                ❌ Debe digitar la marca del avión.
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group BustLabel" align="center">
                                            <label for="txtcolumnas" class="form-label">Columnas de Asientos:</label>
                                            <select  class="form-select" id="txtcolumnas" required>
                                                <option>
                                                    6
                                                </option>
                                                <option>
                                                    9
                                                </option>
                                            </select>
                                            <div class="valid-feedback">
                                                ✔️ Parece bien!
                                            </div>
                                            <div class="invalid-feedback">
                                                ❌ Debe digitar la marca del avión.
                                            </div>
                                        </div>


                                        <div class="Division"></div>
                                        <div class="form-group" align="Right">
                                            <input type="hidden" id="typeAction" value="add_Avion" />
                                            <button class="btn btn-primary BustButton" id="modif_Avion" type="submit">Aplicar</button>
                                            <button class="btn btn-primary BustButton" id="enviar_Avion" type="submit">Agregar</button>
                                            <button class="btn btn-danger" id="Limpiar_avion" type="reset" onclick="btn_mod(0)">Cancelar</button>
                                        </div>
                                        <br>
                                        <h3 align="Left" class="BustLabel">
                                            Panel de control
                                        </h3>
                                        <div class="Division"></div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <table id="dt_Avion"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr class="BustLabel">
                                                            <th>ID AVIÓN</th>
                                                            <th>AÑO</th>
                                                            <th>MODELO</th>
                                                            <th>MARCA</th>
                                                            <th>FILAS</th>
                                                            <th>COLUMNAS</th>
                                                            <th>ULT. USUARIO</th>
                                                            <th>ULT. MODIFICACIÓN</th>
                                                            <th>ACCION</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="perfilOpcionModificarRutas">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_opcion_administracion(0)">Usuarios</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_opcion_administracion(1)">Horarios</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link BustLabel" onclick="change_estado_opcion_administracion(2)">Aviones</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link active BustLabel" aria-current="page" onclick="change_estado_opcion_administracion(3)">Rutas de Viaje</button>
                            </li>
                        </ul>
                        <br>
                        <h4 align="Left" class="BustLabel">
                            Agregar Ruta
                        </h4>
                        <div class="Division"></div>
                        <div class="Container_26">
                            <!-- Formulario Avión -->                       
                            <div>
                                <div>

                                    <form role="form" id="form_Ruta" onsubmit="return false;" class="row g-3 needs-validation" novalidate action="../backend/controller/AvionController.php">

                                        <div class="col-md-4 form-group BustLabel">
                                            <label for="txtidRuta" class="form-label">ID Ruta:</label>
                                            <input type="text" class="form-control" id="txtidRuta" required>
                                            <input type="text" class="form-control" id="txtidRutaRO" readonly>
                                            <div class="valid-feedback">
                                                ✔️ Parece bien!
                                            </div>
                                            <div class="invalid-feedback">
                                                ❌ Debe digitar un ID de ruta válido.
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group BustLabel">
                                            <label for="SelectidAvion" class="form-label">ID Avión:</label>
                                            <select class="form-select" id="SelectidAvion" required>
                                                <option disabled selected>Elija una ID Avión.</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <div class="valid-feedback">
                                                ✔️ Parece bien!
                                            </div>
                                            <div class="invalid-feedback">
                                                ❌ Debe digitar un ID de avión válido.
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group BustLabel">
                                            <label for="SelectidHorario" class="form-label">ID Horario:</label>
                                            <select class="form-select" id="SelectidHorario" required>
                                                <option disabled selected>Elija una ID Horario.</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <div class="valid-feedback">
                                                ✔️ Parece bien!
                                            </div>
                                            <div class="invalid-feedback">
                                                ❌ Debe digitar un ID de horario válido.
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group BustLabel">
                                            <label for="txtOrigen" class="form-label">Origen:</label>
                                            <input type="text" class="form-control" id="txtOrigen" required>
                                            <div class="valid-feedback">
                                                ✔️ Parece bien!
                                            </div>
                                            <div class="invalid-feedback">
                                                ❌ Debe digitar un origen.
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group BustLabel">
                                            <label for="txtDestino" class="form-label">Destino:</label>
                                            <input type="text" class="form-control" id="txtDestino" required>
                                            <div class="valid-feedback">
                                                ✔️ Parece bien!
                                            </div>
                                            <div class="invalid-feedback">
                                                ❌ Debe digitar un destino.
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group BustLabel">
                                            <label for="txtDescuento" class="form-label">Descuento:</label>
                                            <input type="text" class="form-control" id="txtDescuento" placeholder="Opcional">

                                        </div>
                                        <div class="col-md-4 form-group BustLabel">
                                            <label for="txtsubTotal" class="form-label">Precio:</label>
                                            <input type="text" class="form-control" id="txtsubTotal" required>
                                        </div>
                                        <div class="valid-feedback">
                                            ✔️ Parece bien!
                                        </div>
                                        <div class="invalid-feedback">
                                            ❌ Debe digitar un precio.
                                        </div>

                                        <div class="col-md-4 form-group BustLabel">
                                            <label for="RdbActivo" class="form-label">Ruta:</label>
                                            <br>
                                            <input type="radio" id="RdbActivo" name="Selection" value= "True" align="bottom" required checked> Activa.
                                            <input type="radio" id="RdbDesactivo" name="Selection" value= "False" align="bottom"required> Desactiva.
                                            <div class="valid-feedback">
                                                ✔️ Parece bien!
                                            </div>
                                            <div class="invalid-feedback">
                                                ❌ Debe indicar si está activo o no.
                                            </div>
                                        </div>
                                        <div class="Division"></div>
                                        <div class="form-group" align="Right">
                                            <input type="hidden" id="typeAction2" value="add_Ruta" />
                                            <button class="btn btn-primary BustButton" id="modif_Ruta" type="submit">Aplicar</button>
                                            <button class="btn btn-primary BustButton" id="enviar_Ruta" type="submit">Agregar</button>
                                            <button class="btn btn-danger" id="limpiar_ruta" type="reset">Cancelar</button>
                                        </div>
                                        <br>
                                        <h3 align="Left" class="BustLabel">
                                            Panel de control
                                        </h3>
                                        <div class="Division"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table id="dt_Ruta"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr class="BustLabel">
                                                            <th>ID RUTA</th>
                                                            <th>ORIGEN</th>
                                                            <th>DESTINO</th>
                                                            <th>AVION</th>
                                                            <th>HORARIO</th>
                                                            <th>DESCUENTO</th>
                                                            <th>ACTIVO</th>
                                                            <th>SUBTOTAL</th>
                                                            <th>ULT. USUARIO</th>
                                                            <th>ACCION</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Seccion Administracion -->
                </div>
            </div>

            <script src="js/jquery.js"></script>
            <script src="js/jquery-ui.min.js"></script>
            <script src="js/jquery-ui.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/bootstrap-datepicker.js"></script>


            <script src="lib/dataTableFull/datatables/media/js/jquery.dataTables.js"></script>
            <script src="lib/dataTableFull/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
            <script src="lib/dataTableFull/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
            <script src="lib/dataTableFull/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
            <script src="lib/dataTableFull/datatables.net-buttons/js/buttons.flash.min.js"></script>
            <script src="lib/dataTableFull/datatables.net-buttons/js/buttons.html5.min.js"></script>
            <script src="lib/dataTableFull/datatables.net-buttons/js/buttons.print.min.js"></script>
            <script src="lib/dataTableFull/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
            <script src="lib/dataTableFull/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
            <script src="lib/dataTableFull/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="lib/dataTableFull/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>

            <script src="JS/perfilFunctions.js"></script>
    </body>
</html>