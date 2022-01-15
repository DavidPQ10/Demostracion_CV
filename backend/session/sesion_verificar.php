<?php

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "verify_user") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'user') != null)) {
                session_name("Sesion_Usuario");
                session_start();
                
                if (!(isset($_SESSION['userData']))) {
                    echo('E~No hay sesión inciada');
                } else {
                    echo('M~La sesion esta abierta');
                }
            }
        }
    } catch (Exception $e) { //exception generated in the business object..
        echo("E~" . $e->getMessage());
    }
} else {
    echo('M~Parametros no enviados desde el formulario'); //se codifica un mensaje para enviar
}

?>

