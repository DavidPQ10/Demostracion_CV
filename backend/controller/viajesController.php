<?php

require_once("../bo/RutaBo.php");
require_once("../domain/Ruta.php");

if (filter_input(INPUT_POST, 'action') != null) {
    try {
        $myRutaBo = new RutaBo();
        $myRuta = Ruta::createNullRuta();
        $action = filter_input(INPUT_POST, 'action');
        
        if($action === "showAll_viajes"){
            $resultDB = $myRutaBo->getAll();
            $json = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }
        
    } catch (Exception $e) {
        echo("E~" . $e->getMessage());
    }
} else {
    echo('M~Parametros no enviados desde el formulario.');
}

