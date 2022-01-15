<?php

require_once("../bo/RutaBo.php");
require_once("../domain/Ruta.php");

//************************************************************
// Ruta Controller 
//************************************************************

function obtener_usuario() {
    session_name('Sesion_Usuario');
    session_start();
    if (!(isset($_SESSION['userData']))) {
        echo ("E~No hay ninguna sesión iniciada.");
    } else {
        $arreglo = $_SESSION['userData']; // obtiene el dato de la sesión
        return $arreglo[0];
    }
}

function convertir_booleano($bit) {
    if ($bit === "True") {
        return true;
    } else {
        return false;
    }
}

function desc_vacio($desc) {
    if ($desc === "") {
        return 0.00;
    } else {
        return $desc;
    }
}

if (filter_input(INPUT_POST, 'action') != null) {

    try {
        $myRutaBo = new RutaBo();
        $myRuta = Ruta::createNullRuta();
        $action = filter_input(INPUT_POST, 'action');
        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_Ruta" or $action === "update_Ruta") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idRuta_de_vuelo') != null) && (filter_input(INPUT_POST, 'idAvion') != null) &&
                    (filter_input(INPUT_POST, 'idHorario') != null) && (filter_input(INPUT_POST, 'Origen') != null) &&
                    (filter_input(INPUT_POST, 'Destino') != null) && (filter_input(INPUT_POST, 'subTotal') != null) &&
                    (filter_input(INPUT_POST, 'Activo') != null)) {
                $myRuta->setidRuta_de_vuelo(filter_input(INPUT_POST, 'idRuta_de_vuelo'));
                $myRuta->setidAvion(filter_input(INPUT_POST, 'idAvion'));
                $myRuta->setidHorario(filter_input(INPUT_POST, 'idHorario'));
                $myRuta->setOrigen(filter_input(INPUT_POST, 'Origen'));
                $myRuta->setDestino(filter_input(INPUT_POST, 'Destino'));
                $myRuta->setSubTotal(filter_input(INPUT_POST, 'subTotal'));
                $myRuta->setActivo(convertir_booleano(filter_input(INPUT_POST, 'Activo')));
                $myRuta->setDescuento(desc_vacio(filter_input(INPUT_POST, 'Descuento')));
                $myRuta->setLastUser(obtener_usuario());
                if ($action == "add_Ruta") {
                    $myRutaBo->add($myRuta);
                    echo('M~Registro Incluido Correctamente!');
                }
                if ($action == "update_Ruta") {
                    $myRutaBo->update($myRuta);
                    echo('M~Registro Modificado Correctamente!');
                }
            } else {
                echo('E~Los valores no fueron enviados.');
            }
        }
        if ($action === "showAll_Ruta") {//accion de consultar todos los registros
            $resultDB = $myRutaBo->getAll();
            $json = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }
        if ($action === "show_Ruta") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idRuta_de_vuelo') != null) {
                $myRuta->setidRuta_de_vuelo(filter_input(INPUT_POST, 'idRuta_de_vuelo'));
                $myRuta = $myRutaBo->searchById($myRuta);
                if ($myRuta != null) {
                    echo json_encode($myRuta);
                } else {
                    echo('E~NO Existe una ruta con el ID especificado');
                    return null;
                }
            }
        }
        if ($action === "delete_Ruta") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idRuta_de_vuelo') != null) {
                $myRuta->setidRuta_de_vuelo(filter_input(INPUT_POST, 'idRuta_de_vuelo'));
                $myRutaBo->delete($myRuta);
                echo('M~Registro Fue Eliminado Correctamente');
            }
        }

        if ($action === "show_busqueda") {//accion de consultar todos los registros
            $resultDB = $myRutaBo->getBusqueda();
            $json = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }


        //***********************************************************
        //se captura cualquier error generado
        //***********************************************************
    } catch (Exception $e) { //exception generated in the business object..
        echo("E~" . $e->getMessage());
    }
} else {
    echo('M~Parametros no enviados desde el formulario'); //se codifica un mensaje para enviar
}
?>
