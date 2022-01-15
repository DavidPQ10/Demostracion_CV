<?php

class sesion_crear {

    function __constructor() {
        session_name("Sesion_Usuario");
        session_start();

        if (!(isset($_SESSION['userData']))) {
            echo ("El atributo userData no existe en sesion y se procede a crearlo<br>");
            $arreglo = array();
            $_SESSION['userData'] = $arreglo;
        } else {
            echo ("El atributo userData existe en sesion<br>");
        }

        echo("<br>Estado de la sesión :" . session_status());
        echo("<br>ID de la sesión :" . session_id() );
    }

}
