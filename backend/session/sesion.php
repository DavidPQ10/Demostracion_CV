<?php

class sesion {

    function __construct() {
        session_name("Sesion_Usuario");
        session_start();
        if (!(isset($_SESSION['userData']))) {
            echo ("El atributo userData no existe en sesion y se procede a crearlo<br>");
            $arreglo = array();
            $_SESSION['userData'] = $arreglo;
        } else {
            echo ("El atributo userData existe en sesion<br>");
        }
    }

    function agregar_datos_en_sesion($data) {
        session_name("Sesion_Usuario");
        session_start();
        if (!(isset($_SESSION['userData']))) {
            echo ("El atributo userData no existe en sesion, por favor inicia una sesion<br>");
        } else {
            echo ("El atributo userData existe en sesion<br>");
            $arreglo = $_SESSION['userData']; // obtiene el dato de la sesión
            $arreglo = $data;
            echo ("Se inicio una nueva sesión de usuario<br>");
            $_SESSION['userData'] = $arreglo; // regresa el dato de la sesión
        }
    }

}
