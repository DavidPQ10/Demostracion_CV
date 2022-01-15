<?php

require_once("../bo/ReservacionBo.php");
require_once("../domain/Reservacion.php");

function obtener_usuario() {
    session_name('Sesion_Usuario');
    session_start();
    if (!(isset($_SESSION['userData']))) {
        return null;
    } else {
        $arreglo = $_SESSION['userData']; // obtiene el dato de la sesión
        return $arreglo[0];
    }
}

if (filter_input(INPUT_POST, 'action') != null) {
    try {
        $myReservacionBo = new ReservacionBo();
        $myReservacion = Reservacion::createNullReservacion();
        $action = filter_input(INPUT_POST, 'action');
        
        
        
        
        if ($action === "add_reservation") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idRuta') != null)) {
                $myReservacion->setRuta_de_vuelo(filter_input(INPUT_POST, 'idRuta'));
                $myReservacion->setUsuario(obtener_usuario());
                $myReservacion->setActivo(true);
                $myReservacion->setCheckIn(false);
                $myReservacion->setHoraCheckIn('2021-12-14 08:00');
                $myReservacion->setNumeroPasajeros(4);
                $myReservacion->setPrecioTotal(100.00);
                if ($action == "add_Ruta") {
                    $myReservacionBo->add($myReservacion);
                    echo('M~Registro Incluido Correctamente!');
                }
            } else {
                echo('E~Los valores no fueron enviados.');
            }
        }
        
        

        if ($action === "showAll_reservation") {
            $resultDB = $myReservacionBo->getAll();
            $json = json_encode($resultDB->getArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        if ($action === "show_reservation") {
            $usuario = obtener_usuario();
            $resultDB = $myReservacionBo->searchByUser($usuario);
            $json = json_encode($resultDB->getArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }
        
        if ($action === "show_reservationif") {
            $usuario = obtener_usuario();
            $resultDB = $myReservacionBo->searchByUserCheckIn($usuario);
            $json = json_encode($resultDB->getArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        if ($action === "show_reservationID") {
            if (filter_input(INPUT_POST, 'idReservacion') != null) {
                $myReservacion->setidReservacion(filter_input(INPUT_POST, 'idReservacion'));
                $myReservacion = $myReservacionBo->searchById($myReservacion);
                $json = json_encode($myReservacion);                
                echo $json;
            } else {
                echo('E~No se han enviado datos desde el formulario.');
            }
        }
        
        if ($action === "update_reservationID") {
            if (filter_input(INPUT_POST, 'idReservacion') != null) {
                $myReservacion->setidReservacion(filter_input(INPUT_POST, 'idReservacion'));
                $myReservacion = $myReservacionBo->setCheckIn($myReservacion);             

            } else {
                echo('E~No se han enviado datos desde el formulario.');
            }
        }
    } catch (Exception $e) {
        echo("E~" . $e->getMessage());
    }
} else {
    echo('M~Parametros no enviados desde el formulario.');
}

