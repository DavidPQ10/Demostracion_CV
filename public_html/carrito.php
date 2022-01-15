<?php ?>
<!doctype html>
<head>
    <title>AirBust: Carrito</title>

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
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css"/>
    <!--hoja de estilos carrito.css-->
    <link rel="stylesheet" type="text/css" href="CSS/carritoStyles.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/principalStyles.css"/>

    <!--sweet alert dependencias-->
    <script src="lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
    <link href="lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
    
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
    <br>
    <div>
        <div class="Container1">
            <div class="row">
                <div class="col-2 Container2">
                    <h3 class="TextStyle1">Tipo de cambio</h3>  
                </div>
                <div class="col-2 Container3">
                    <div id="cambio"></div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div aling="center">
        <a href="card.php"><button class="btn btn-primary" >Proceder a pagar</button></a>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    
    <!--Fuciones carrito.js-->
    
    <script src="./JS/carritoFunction.js"></script>
    <script src="JS/principalFunctions.js"></script>
    <script src="js/jquery3_5_1.min.js" type="text/javascript"></script>
</body>