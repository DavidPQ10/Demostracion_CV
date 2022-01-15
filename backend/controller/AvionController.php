<?php

require_once("../bo/AvionBo.php");
require_once("../domain/Avion.php");
require_once("../domain/Asientos.php");
require_once("../bo/AsientosBo.php");

//************************************************************
// Avion Controller 
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

if (filter_input(INPUT_POST, 'action') != null) {

    try {
        $myAvionBo = new AvionBo();
        $myAvion = Avion::createNullAvion();
        $myAsientosBo = new AsientosBo();
        $myAsientos = Asientos::createNullAsiento();
        $action = filter_input(INPUT_POST, 'action');
        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_Avion" or $action === "update_Avion") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idAvion') != null) && (filter_input(INPUT_POST, 'Anio') != null) &&
                    (filter_input(INPUT_POST, 'Modelo') != null) && (filter_input(INPUT_POST, 'Marca') != null) && (filter_input(INPUT_POST, 'Fila') != null) && (filter_input(INPUT_POST, 'Columna') != null)) {
                $myAvion->setidAvion(filter_input(INPUT_POST, 'idAvion'));
                $myAvion->setAnio(filter_input(INPUT_POST, 'Anio'));
                $myAvion->setModelo(filter_input(INPUT_POST, 'Modelo'));
                $myAvion->setMarca(filter_input(INPUT_POST, 'Marca'));
                $myAvion->setFilas(filter_input(INPUT_POST, 'Fila'));
                $myAvion->setColumnas(filter_input(INPUT_POST, 'Columna'));
                $myAvion->setLastUser(obtener_usuario());
                if ($action == "add_Avion") {
                    $myAvionBo->add($myAvion);
                    $filas = filter_input(INPUT_POST, 'Fila');
                    $columnas = filter_input(INPUT_POST, 'Columna');
                    $asientoNum = 0;
                    $asientoLetra = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
                    for ($i = 0; $i < $filas; $i++) {
                        $asientoNum = 0;
                        for ($j = 0; $j < $columnas; $j++) {
                            $myAsientos = Asientos::createNullAsiento();
                            $myAsientos->setNombre_Asiento($asientoLetra[$i] . $asientoNum . " " . filter_input(INPUT_POST, 'idAvion'));
                            $myAsientos->setFila($i);
                            $myAsientos->setColuman($j);
                            $myAsientos->setReservado(false);
                            $myAsientosBo->add($myAsientos);
                            $asientoNum++;
                        }
                    }
                    echo('M~Registro Incluido Correctamente!');
                }
                if ($action == "update_Avion") {
                    $myAvionBo->update($myAvion);
                    echo('M~Registro Modificado Correctamente!');
                }
            } else {
                echo('E~Los valores no fueron enviados.');
            }
        }


        if ($action === "showAll_Avion") {//accion de consultar todos los registros
            $resultDB = $myAvionBo->getAll();
            $json = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        /*         * *********************************Inicio nuevo****************************************************** */
        if ($action === "showAll_idAvion") {//accion de consultar todos los registros
            $resultDB = $myAvionBo->getAll();
            $json = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }
        /*         * *********************************Fin Nuevo******************************************************** */

        if ($action === "show_Avion") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idAvion') != null) {
                $myAvion->setidAvion(filter_input(INPUT_POST, 'idAvion'));
                $myAvion = $myAvionBo->searchById($myAvion);
                if ($myAvion != null) {
                    echo json_encode($myAvion);
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                    return null;
                }
            }
        }
        
        
        
        if ($action === "show_Asiento") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idAsiento') != null)) {
                $myAsientos->setNombre_Asiento(filter_input(INPUT_POST, 'idAsiento'));
                $myAsientos = $myAsientosBo->searchById($myAsientos);
                if ($myAsientos != null) {
                    echo json_encode($myAsientos);
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                    return null;
                }
            }
        }
        
        if ($action === "showAll_Asientos") {//accion de consultar todos los registros
            $resultDB = $myAsientosBo->getAll();
            $json = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }
        
        if ($action === "update_asiento") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idAsiento') != null) && (filter_input(INPUT_POST, 'reservacion'))) {
                $myAsientos->setNombre_Asiento(filter_input(INPUT_POST, 'idAsiento'));
                $myAsientos->setReservado(true);
                $myAsientos->setIdUsuario(obtener_usuario());
                $myAsientos->setReservacion(filter_input(INPUT_POST, 'reservacion'));
                $myAsientos = $myAsientosBo->setReservado($myAsientos);
            }
        }
        
        
        
        if ($action === "delete_Avion") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idAvion') != null) &&
                    (filter_input(INPUT_POST, 'filas') != null) &&
                    (filter_input(INPUT_POST, 'columnas') != null)) {
                $filas = filter_input(INPUT_POST, 'filas');
                $columnas = filter_input(INPUT_POST, 'columnas');
                $asientoNum = 0;
                $asientoLetra = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
                for ($i = 0; $i < $filas; $i++) {
                    $asientoNum = 0;
                    for ($j = 0; $j < $columnas; $j++) {
                        $myAsientos->setNombre_Asiento($asientoLetra[$i] . $asientoNum . " " . filter_input(INPUT_POST, 'idAvion'));
                        $myAsientosBo->delete($myAsientos);
                        $asientoNum++;
                    }
                }
                $myAvion->setidAvion(filter_input(INPUT_POST, 'idAvion'));
                $myAvionBo->delete($myAvion);
                echo('M~Registro Fue Eliminado Correctamente');
            } else {
                echo('E~No se han enviado los datos desde el formulario.');
            }
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
