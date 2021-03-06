<!DOCTYPE html>
<html>
    <head>
        <link href="CSS/card.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="CSS/carritoStyles.css"/>
        <script
            type="text/javascript"
            src="https://sandbox.web.squarecdn.com/v1/square.js"
        ></script>
        <script>
            const appId = 'sandbox-sq0idb-BBUj1VIutHO7-KuzFFmyvw';
            const locationId = 'LRFAYV56WQJAX';
            async function initializeCard(payments) {
            const card = await payments.card();
            await card.attach('#card-container');
            return card;
            }

            async function createPayment(token) {
            const body = JSON.stringify({
            locationId,
                    sourceId: token,
            });
            const paymentResponse = await fetch('/payment', {
            method: 'POST',
                    headers: {
                    'Content-Type': 'application/json',
                    },
                    body,
            });
            if (paymentResponse.ok) {
            return paymentResponse.json();
            }

            const errorBody = await paymentResponse.text();
            throw new Error(errorBody);
            }

            async function tokenize(paymentMethod) {
            const tokenResult = await paymentMethod.tokenize();
            if (tokenResult.status === 'OK') {
            return tokenResult.token;
            } else {
            let errorMessage = `Tokenization failed with status: ${tokenResult.status}`;
            if (tokenResult.errors) {
            errorMessage += ` and errors: ${JSON.stringify(
                    tokenResult.errors
                    )}`;
            }

            throw new Error(errorMessage);
            }
            }

            // status is either SUCCESS or FAILURE;
            function displayPaymentResults(status) {
            const statusContainer = document.getElementById(
                    'payment-status-container'
                    );
            if (status === 'SUCCESS') {
            statusContainer.classList.remove('is-failure');
            statusContainer.classList.add('is-success');
            } else {
            statusContainer.classList.remove('is-success');
            statusContainer.classList.add('is-failure');
            }

            statusContainer.style.visibility = 'visible';
            }

            document.addEventListener('DOMContentLoaded', async function () {
            if (!window.Square) {
            throw new Error('Square.js failed to load properly');
            }

            let payments;
            try {
            payments = window.Square.payments(appId, locationId);
            } catch {
            const statusContainer = document.getElementById(
                    'payment-status-container'
                    );
            statusContainer.className = 'missing-credentials';
            statusContainer.style.visibility = 'visible';
            return;
            }

            let card;
            try {
            card = await initializeCard(payments);
            } catch (e) {
            console.error('Initializing Card failed', e);
            return;
            }

            // Checkpoint 2.
            async function handlePaymentMethodSubmission(event, paymentMethod) {
            event.preventDefault();
            try {
            // disable the submit button as we await tokenization and make a payment request.
            cardButton.disabled = true;
            const token = await tokenize(paymentMethod);
            const paymentResults = await createPayment(token);
            displayPaymentResults('SUCCESS');
            console.debug('Payment Success', paymentResults);
            } catch (e) {
            cardButton.disabled = false;
            displayPaymentResults(/*'FAILURE'*/'SUCCESS');
            console.error(e.message);
            }
            }

            const cardButton = document.getElementById('card-button');
            cardButton.addEventListener('click', async function (event) {
            await handlePaymentMethodSubmission(event, card);
            //            alert("Pago realizado.");
            });
            });
        </script>
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
        <!-- Men?? -->
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
                                    <nav id="navCuentaIniciada">
                                        <div class="nav-item dropdown">
                                            <button class="nav-item dropdown-toggle btn ButtonS1"role="button" data-bs-toggle="dropdown">
                                                <label id="UsuarioBtnText">Usuario</label>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="Perfil.php">Mi Perfil</a></li>
                                                <li><a class="dropdown-item" href="carrito.php">Carrito de Compras</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="#" onclick="close_session()">Cerrar Sesi??n</a></li>
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
        <!-- Men?? -->

        
        <br><br>
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
        
        
        
        <form id="payment-form">
            <div id="card-container"></div>
            <input type="hidden" id="rutaDeViajeContainer" value=""/>
            <button id="card-button" type="button" onclick="crear_reservacion()">Pay</button>
        </form>
        <div id="payment-status-container"></div>

        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="JS/principalFunctions.js"></script>
        <script src="./JS/busquedaFuntions.js"></script>
        
    </body>
</html>