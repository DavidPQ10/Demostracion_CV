<?php

class sesion_Mostrar {

    function __constructor() {

        session_name("Sesion_Usuario");
        session_start();

        if (!(isset($_SESSION['userData']))) {
            echo ("El atributo userData no existe en sesion, por favor ejecutar el archivo php que la crea<br>");
        } else {
            echo ("El atributo userData existe en sesion, se procede a mostrar<br><br>");
            $arreglo = $_SESSION['userData']; // obtiene el dato de la sesión
            return $arreglo;
        }

        echo("<br><br>Estado de la sesión :" . session_status());
        echo("<br>ID de la sesión :" . session_id() );
    }

}
