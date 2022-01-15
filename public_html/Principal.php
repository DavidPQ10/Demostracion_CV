<?php ?>

<!DOCTYPE html>
<head>
    <title>AirBust</title>
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
                <h1 class="tittleStyle1" aling="center"> Comienza tu Viaje con AirBust </h1>
                <br>
                <div class="autoMargin2">
                    <span class="radioOptionContainer">
                        <input class="form-check-input" type="radio" value="1" name="radioViaje" id="radioIdaVuelta">
                        <label class="form-check-label" for="flexCheckDefault">
                            Ida y Vuelta
                        </label>
                    </span>
                    <span class="radioOptionContainer">
                        <input class="form-check-input"type="radio" value="0" name="radioViaje" id="radioIda">
                        <label class="form-check-label" for="flexCheckDefault" style="width: fit-content;">
                            Solo Ida
                        </label>
                    </span>
                </div>
                <div class="division"></div>
                <br>
                <div style="margin-bottom: 2%;" align="center">
                    <span class="inlineStyle1">
                        <select class="form-select" aria-label="Default select example">
                            <option selected disabled value="">Origen</option>
                            <option value="1">Costa Rica</option>
                            <option value="2">Estados Unidos</option>
                            <option value="3">Canada</option>
                        </select>
                    </span>
                    <span class="inlineStyle1">
                        <div class="fromToImage" align="center"></div>
                    </span>
                    <span class="inlineStyle1">
                        <select class="form-select" aria-label="Default select example">
                            <option selected disabled value="">Destino</option>
                            <option value="1">Costa Rica</option>
                            <option value="2">Estados Unidos</option>
                            <option value="3">Canada</option>
                        </select>
                    </span>
                </div>
                <div class="division"></div>
                <br>
                <div class="row" align="center">
                    <div class="col-4 dateContainer" align="center" id="date-picker">
                        <label>Fecha de salida</label>
                        <img src="img/date.png" align="right" class="dateImage">
                        <br>
                        <div class="division"></div>
                        <br>
                        <input class="form-control" type="text" autocomplete="off" id="salida" placeholder="yyyy-mm-dd">
                    </div>
                    <div class="col-4 dateContainer" align="center" id="date-picker">
                        <label>Fecha de Regreso</label>
                        <img src="img/date.png" align="right" class="dateImage">
                        <div class="division"></div>
                        <br>
                        <input class="form-control" type="text" autocomplete="off" id="regreso" placeholder="yyyy-mm-dd">
                    </div>
                    <div class="col-4 dateContainer" align="center">
                        <label>Número de Pasajeros</label>
                        <img src="img/user.png" class="numPassengersImage">
                        <div class="division"></div>
                        <br>
                        <input type="number">
                    </div>
                </div>
                <br>                
                <br>
                <div class="division"></div>
                <br>
                <a href="Busqueda.php"><button type="button" class="ButtonS2-lg">Buscar Viaje</button></a>
            </div>
            <br><br>
        </div>
        <br>
        <div class="division"></div>
        <br>
    </div>


    <div id="infContainer" class="row">
        <div class="col-6" align="center">
            <div id="Descuentos_slider" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#Descuentos_slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#Descuentos_slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#Descuentos_slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/playa1.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Descuento a Playas de Costa Rica</h5>
                            <p>Aprovecha un 50% para disfrutar en las playas de Costa Rica.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/playa2.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Visita Islas Paradisiacas</h5>
                            <p>Con Airbust puedes viajar a islas increíbles con descuentos de hasta un 30%.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/playa3.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>¿Te Gustan las Grandes Ciudades?</h5>
                            <p>Participa en una encuesta para poder obtener viajes a Japón o Dubai.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#Descuentos_slider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#Descuentos_slider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="col-6" align="center">
            <div id="Contacto_slider" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#Contacto_slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#Contacto_slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#Contacto_slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/icon.png" class="d-block w-100" alt="...">
 
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#Contacto_slider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#Contacto_slider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>


        <br>
        <div class="division"></div>
        <br><br><br>
        <div>
            <div id="navInfoOption1">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <button class="nav-link active" aria-current="page" onclick="change_info_state(0)">Referente Institucional</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" onclick="change_info_state(1)">Historia de la Empresa</button>
                    </li>
                </ul>
            </div>
            <div id="navInfoOption2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <button class="nav-link" onclick="change_info_state(0)">Referente Institucional</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link active" aria-current="page" onclick="change_info_state(1)">Historia de la Empresa</button>
                    </li>
                </ul>
            </div>
            <div id="navInfo1" class="row">
                <div class="col-3" align="center">
                    <br>
                    <br><br>
                    <img src="img/icon1.png" class="imgLogo" align="center">
                    <br><br>
                </div>
                <div class="col-7"> 
                    <br><br>    
                    <h4>Referente Institucional</h4>
                    <p>AirBust es una institución creada en 2010 que desde el 2017 se especializa en la gestión de viajes aereos a traves del mundo.
                        Contamos con diversas aerolíneas que nos brindan aviones desde los más lujosos hasta opciones más cómodas para que
                        los usuarios puedan elegir entre una gran variedad de opciones que se acoplen a lo que están buscando para su viaje.
                    </p>
                    <p>
                        Cada vez nos esforzamos por crear más conexiones con aerolíneas para poder ofrecer a los clientes una mayor variedad
                        de opciones para sus viajes. La comodidad de nuestros usuarios es lo más importante por lo que hacemos esfuerzos para
                        validar rutas de viaje de todo tipo para su comodidad.
                    </p>
                    <p>
                        AirBust esta conciente que en muchas ocasiones realizar un viaje aereo para disfrutar de los destinos exoticos de 
                        otros paises es un poco complicado y no es posible para muchas personas. Por esta razón intentamos brindar diversos
                        descuentos con frecuencia para que nuestros usuarios puedan aprovechar al máximo el placer de viajar de una forma más
                        accesible.
                    </p>
                    <p>
                        La empresa también ha realizado diferentes alianzas con cadenas hoteleras que potencian a gran escala los descuentos y 
                        rutas que ofrecemos a los usuarios.
                    </p>
                </div>
            </div>
            <div id="navInfo2" class="row">

                <div class="col-3" align="center">
                    <br>
                    <br><br>
                    <img src="img/icon1.png" class="imgLogo" align="center">
                    <br><br>
                </div>
                <div class="col-7">
                    <br><br>
                    <h4>Historia de la Empresa</h4>
                    <p>
                        AirBust es una empresa creada en 2010 con origen Costarricense. Se empezó como una empresa pequeña
                        dedicada al turismo llamada "BustTravel". La empresa solía ofrecer viajes o tours dentro del terrotorio nacional a los lugares 
                        más exóticos como playas, montañas, etc.
                    </p>
                    <p>
                        A partir del 2015 BustTravel empezó a hacer alianzas y conexiones con diversas cadenas hoteleras. También 
                        creamos un sistema de usuarios que al asociarse con nuestra empresa podían realizar reservaciones con diversos
                        descuentos.
                    </p>
                    <p>
                        Desde el 2017 y hasta entonces, la empresa ha logrado crear alianzas internacionales con hoteles todo incluido y 
                        también con diferentes aerolíneas que nos permiten gestionar rutas de vuelo a los diversos destinos. De esta forma
                        la empresa se dedicó en su totalidad a gestionar este tipo de viajes y cambio su nombre por AirBust.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Contenido -->

    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="JS/principalFunctions.js"></script>
</body>
