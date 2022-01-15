<?php ?>

<!DOCTYPE hmtl>
<html>
    <head>
        <meta charset="UTF-8">
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
        <link rel="stylesheet" type="text/css" href="CSS/jquery-ui.min.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/jquery-ui.structure.min.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/jquery-ui.theme.min.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/bootstrap-datepicker.css">
        <link href="CSS/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="CSS/styles.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/principalStyles.css"/>
        <link rel="stylesheet" type="text/css" href="CSS/SesionUsuarioStyles.css"/>

        <!--Sweet alert dependencias-->
        <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
        <link href="lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
        
        <!--Maps dependencias-->
    
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <link rel="stylesheet" type="text/css" href="./CSS/mapa.css" />
        <script src="./JS/mapa.js"></script>
    
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
                                <a href="#"><button class="btn ButtonS1" type="button" id="navIniciarSesion">Iniciar Sesión</button></a>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="division"></div>
        <br><br>
        <!-- Menú -->
        <div class="ContainerPrincipal">
            <div class="ContainerSecundario row">
                <div class="ContainerInformativo col-2">
                    <h3 id="IniciarSesionTittle" align="center">Iniciar Sesión</h3>
                    <h3 id="RegistrarseTittle" align="center">Registrarse</h3>
                    <br>
                    <button type="button" class="BtnInfo" id="registrarseOptionBtn" onclick="change_sessionOptionState(1)">Registrarse</button>
                    <button type="button" class="BtnInfo" id="IniciarSesionOptionBtn" onclick="change_sessionOptionState(0)">Iniciar Sesión</button>
                </div>
                <div class="ContainerContenido col-2">

                    <div>
                        <form class="g-3 needs-validation" id="iniciar_sesionForm" onsubmit="return false;" novalidate autocomplete="off" action="../backend/controller/usuarioController.php">                                    
                            <div class="col-md-6 marginContenido">
                                <label for="initUsername" class="form-label">Nombre de Usuario:</label>
                                <input type="text" class="form-control" id="initUsername"  required autocomplete="off">
                                <div id="validationUsernameFeedback" class="invalid-feedback">
                                    Por favor ingresa un nombre de usuario.
                                </div>
                            </div>
                            <div class="col-md-6 marginContenido">
                                <label for="initPassword" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="initPassword" required autocomplete="off">
                                <div id="validationPasswordFeedback" class="invalid-feedback">
                                    Debes Ingresar una contraseña.
                                </div>
                            </div>
                            <div class="col-12 marginContenido" style="width: 50%; margin-top: 10px;">
                                <input type="hidden" id="typeActioninit" value="iniciar_session" />
                                <button class="BtnAction" id="IniciarSessionBtn" style="width: 100%" type="submit">Ingresar</button>
                            </div>
                        </form>      
                    </div>

                    <div>
                        <form role="form" id="registrarseForm" onsubmit="return false;" class="row g-3 needs-validation" novalidate action="../backend/controller/usuarioController.php">

                            <div class="col-md-4">
                                <label for="txtnombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="txtnombre" required>
                                <div class="valid-feedback">
                                    Parece bien!
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="txtapellido1" class="form-label">Primer Apellido:</label>
                                <input type="text" class="form-control" id="txtapellido1" required>
                                <div class="valid-feedback">
                                    Parece bien!
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="txtapellido2" class="form-label">Segúndo Apellido:</label>
                                <input type="text" class="form-control" id="txtapellido2" required>
                                <div class="valid-feedback">
                                    Parece bien!
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="PK_User" class="form-label">Usuario:</label>
                                <input type="text" class="form-control" id="PK_User" required>
                                <div class="valid-feedback">
                                    Parece bien!
                                </div>
                            </div>

                            <div class="col-8">
                                <label for="txtCorreo" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="txtCorreo" aria-describedby="emailHelp" required>
                                <div id="emailHelp" class="form-text">No se compartirá su dirección de correo electrónico.</div>
                                <div class="invalid-feedback">
                                    Por favor ingrese un correo electrónico.
                                </div>
                            </div>

                            <div id="date-picker" class="col-4">
                                <div id="FechaNacimiento">
                                    <label for="txtfecNacimiento" class="form-label">Fecha de Nacimiento:</label>
                                    <input class="form-control" type="text" autocomplete="off" id="txtfecNacimiento" placeholder="yyyy-mm-dd" required>
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese su fecha de nacimiento.
                                </div>
                            </div>


                            <div class="col-4">
                                <label for="txtcelular" class="form-label">Telefono Celular:</label>
                                <input class="form-control" type="text" autocomplete="off" id="txtcelular" placeholder="(+506)9999-9999" required>
                                <div class="invalid-feedback">
                                    Por favor ingrese su número celular.
                                </div>
                            </div>

                            <div class="col-4">
                                <label for="txtcelularOficina" class="form-label">Telefono de Oficina:</label>
                                <input class="form-control" type="text" autocomplete="off" id="txtcelularOficina" placeholder="(Opcional)">
                            </div>

                            <div class="col-6">
                                <label for="txtcontrasegna" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="txtcontrasegna" required>
                                <div class="valid-feedback">
                                    Parece bien!
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="txtvalidarContrasegna" class="form-label">Confirmar Contraseña:</label>
                                <input type="password" class="form-control" id="txtvalidarContrasegna" required>
                                <div class="valid-feedback">
                                    Parece bien!
                                </div>
                            </div>

<!--                            <div class="col-md-4">
                                <label for="txtpais" class="form-label">País:</label>
                                <select class="form-select" id="txtpais" required>
                                    <option selected disabled value="">Seleccione...</option>
                                    <option>Costa Rica</option>
                                </select>
                                <div class="invalid-feedback">
                                    por favor seleccione un país válido.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="txtprovincia" class="form-label">Ciudad:</label>
                                <select class="form-select" id="txtprovincia" required>
                                    <option selected disabled value="">Seleccione...</option>
                                    <option>San José</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor seleccione una ciudad.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="txtcanton" class="form-label">Canton:</label>
                                <select class="form-select" id="txtcanton" required>
                                    <option selected disabled value="">Seleccione...</option>
                                    <option>Coronado</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor seleccione un canton.
                                </div>
                            </div>-->

                            <div class="col-12">
                                <label for="txtDireccion" class="form-label">Dirección:</label>
                                <input type="text"class="form-select" id="txtDireccion" required readonly>
                                <div class="invalid-feedback">
                                    Debe introducir una dirección.
                                </div>
                            </div>
                            <div id="cont-map" class="col-12" style="height: 100px">
                                <div id="map"></div>
                            </div>

                            <div>
                                <input type="hidden" id="typeAction" value="add_usuario" />
                                <input type="hidden" id="txtrol" value="False" />
                                <div class="col-12 margin_1" style="width: 50%; margin-top: 10px;">
                                    <button class="BtnAction" style="width: 100%" id="registraseBtn" type="submit">Registrarse</button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        <br><br><br><br>


        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/javascript.js"></script>
        <script src="JS/SesionUsuarioFunctions.js"></script>
        
        <!--map scrip + token-->
    
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfbDeRZu78dXcOIxOQ7tN490EU3McT2rk&callback=initMap&v=weekly"
          async
        ></script>
    </body>
</html>