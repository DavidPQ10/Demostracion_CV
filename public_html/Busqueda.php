<?php ?>

<!DOCTYPE html>
<head>
    <title>AirBust: Busqueda</title>
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
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">

    <link rel="stylesheet" type="text/css" href="CSS/jquery-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/jquery-ui.structure.min.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/jquery-ui.theme.min.css"/>
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/busquedaStyles.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/principalStyles.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/sidebars.css"/>


    <link href="lib/dataTableFull/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="lib/dataTableFull/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="lib/dataTableFull/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="lib/dataTableFull/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="lib/dataTableFull/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="lib/dataTableFull/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <script src="JS/jquery.min.js"></script>
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
                            <div>
                                <a href="SesionUsuario.php"><button class="btn ButtonS1" type="button" id="navIniciarSesion">Iniciar Sesión</button></a>
                                <nav id="navCuentaIniciada">
                                    <div class="nav-item dropdown">
                                        <button class="nav-item dropdown-toggle btn ButtonS1"role="button" data-bs-toggle="dropdown">
                                            <label id="UsuarioBtnText">Usuario</label>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="Perfil.php">Mi Perfil</a></li>
                                            <li><a class="dropdown-item" href="carrito.php">Carrito de Compras</a></li>
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

    <!-- Contenido -->
    <div class="bodyContainer">
        <div class="backgroundImage">
            <br><br>
            <div class="travelFormContainer">
                <h1 class="tittleStyle1" aling="center"> Viajes Encontrados </h1>
                <br>
                <div align="center" class="cont-trips">
                    <table id="dt_busqueda"  class="table  table-hover dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID RUTA</th>
                                <th>HORA DE SALIDA</th>
                                <th>ORIGEN</th>
                                <th>DESTINO</th>
                                <th>HORA DE ARRIVO</th>
                                <th>SUBTOTAL</th>
                                <th>DESCUENTO</th>
                                <th>ACCIÓN</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

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

    <script src="JS/busquedaFuntions.js"></script>
</body>