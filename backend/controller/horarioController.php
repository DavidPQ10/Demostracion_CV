<?php

require_once("../bo/HorarioBo.php");
require_once("../domain/Horario.php");

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
    $action = filter_input(INPUT_POST, 'action');
    try {
        $myHorarioBo = new HorarioBo();
        $myHorario = Horario::createNullHorario();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_horario" or $action === "update_horario") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idHorario') != null) && (filter_input(INPUT_POST, 'salida') != null) && (filter_input(INPUT_POST, 'arrivo') != null)) {
                $myHorario->setidHorario(filter_input(INPUT_POST, 'idHorario'));
                $myHorario->setSalida(filter_input(INPUT_POST, 'salida'));
                $myHorario->setArrivo(filter_input(INPUT_POST, 'arrivo'));
                $myHorario->setLastUser(obtener_usuario());
                if ($action == "add_horario") {
                    $myHorarioBo->add($myHorario);
                    echo('M~Horario Incluido Correctamente.');
                }else if($action == "update_horario"){
                    $myHorarioBo->update($myHorario);
                    echo('M~Horario Modificado Correctamente.');
                }
            }else{
                echo("E~No se han enviado los valores.");
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_horario") {//accion de consultar todos los registros
            $resultDB = $myHorarioBo->getAll();
            $json = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }
        
        //***********************************************************
        //***********************************************************
/*************************************Inicio Nuevo*****************************************************/
        if ($action === "showAll_idHorario") {//accion de consultar todos los registros
            $resultDB = $myHorarioBo->getAll();
            $json = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }
/*************************************fin Nuevo*****************************************************/
        //***********************************************************
        //***********************************************************
        if ($action === "show_info") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'horarioPK') != null) {
                $myHorario->setidHorario(filter_input(INPUT_POST, 'horarioPK'));
                $myHorario = $myHorarioBo->searchById($myHorario);
                if ($myHorario != null) {
                    echo json_encode(($myHorario));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }else{
                echo('E~No se han enviado los valores.');
            }
        }
        //***********************************************************
        //***********************************************************
        if ($action === "delete_horario") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_horario') != null) {
                $myHorario->setidHorario(filter_input(INPUT_POST, 'PK_horario'));
                $myHorarioBo->delete($myHorario);
                echo('M~Registro Fue Eliminado Correctamente');
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

