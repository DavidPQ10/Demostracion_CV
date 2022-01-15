<?php ?>

<!DOCTYPE html>
<html>
    <title>AirBust: Contactenos</title>
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
    <link rel="stylesheet" type="text/css" href="CSS/contactenosStyles.css"/>

    <!--Maps dependencias-->

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./CSS/maps.css" />
    <script src="./JS/maps.js"></script>

</html>
<body>
    <!-- Barra Menú -->
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
                            <div>
                                <a href="SesionUsuario.php"><button class="btn ButtonS1" type="button" id="navIniciarSesion">Iniciar Sesión</button></a>
                                <nav id="navCuentaIniciada">
                                    <div class="nav-item dropdown">
                                        <button class="nav-item dropdown-toggle btn ButtonS1"role="button" data-bs-toggle="dropdown">
                                            <label id="UsuarioBtnText">Usuario</label>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="Perfil.php">Mi Perfil</a></li>
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
    <!-- Contactenos -->
    <br><br>

    <div>
        <div class="Container1">
            <div class="row">
                <div class="col-2 Container2">
                    <h3 class="TextStyle1">Contactenos</h3>  
                </div>
                <div class="col-2 Container3">
                    Puedes contactarnos mediante los siguientes medios:
                    <br><br>
                    <ul>
                        <li>Número Telefónico: (+506) 2225-3588</li>
                        <li>Correo Electrónico: soporte@airbust.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br><br>

<!--    <div>
        <div class="Container4">
            <div class="row">
                <div class="col-2 Container5">
                    <h3 class="TextStyle1">Ubiquenos aquí:</h3>  
                </div>
                <div class="col-2 Container6">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>-->
    <!--Map ubiquenos-->
    <h1 class="TextStyle2">Ubiquenos aquí:</h1>
    <br>
    <div id="map"></div>
    <br><br>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="JS/contactenosFunctions.js"></script>
    <script src="JS/principalFunctions.js"></script>

    <!--map scrip + token-->

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfbDeRZu78dXcOIxOQ7tN490EU3McT2rk&callback=initMap&v=weekly"
        async
    ></script>

</body>

