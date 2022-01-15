<?php

class sesion_agregar {

    function __constructor($SesionData) {
        session_name("Sesion_Usuario");
        session_start();

        if (!(isset($_SESSION['userData']))) {
            echo ("El atributo userData no existe en sesion, por favor inicia una sesion<br>");
        } else {
            echo ("El atributo userData existe en sesion<br>");
            $arreglo = $_SESSION['userData']; // obtiene el dato de la sesión
            $User = $SesionData;
            $arreglo[] = $User;
            echo ("Se inicio una nueva sesión de usuario<br>");
            $_SESSION['userData'] = $arreglo; // regresa el dato de la sesión
        }

        echo("<br>Estado de la sesión :" . session_status());
        echo("<br>ID de la sesión :" . session_id() );
    }

}
