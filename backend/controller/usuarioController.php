<?php

require_once("../bo/UsuarioBo.php");
require_once("../domain/Usuario.php");
require_once("../session/sesion_crear.php");
require_once("../session/sesion_agregar.php");
require_once("../session/sesion.php");

//************************************************************
// Personas Controller 
//************************************************************
function obtener_usuario() {
    session_name('Sesion_Usuario');
    session_start();
    if (!(isset($_SESSION['userData']))) {
        //echo ("E~No hay ninguna sesión iniciada.");
    } else {
        $arreglo = $_SESSION['userData']; // obtiene el dato de la sesión
        return $arreglo[0];
    }
}

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myUsuarioBo = new UsuarioBo();
        $myUsuario = Usuario::createNullUsuario();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_usuario") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'PK_User') != null) && (filter_input(INPUT_POST, 'nombre') != null) &&
                    (filter_input(INPUT_POST, 'apellido1') != null) && (filter_input(INPUT_POST, 'apellido2') != null) &&
                    (filter_input(INPUT_POST, 'correoElectronico') != null) && (filter_input(INPUT_POST, 'fecNacimiento') != null) &&
                    (filter_input(INPUT_POST, 'celular') != null) && (filter_input(INPUT_POST, 'contrasegna') != null) 
                    && (filter_input(INPUT_POST, 'direccion') != null)) {

                $myUsuario->setNombre_Usuario(filter_input(INPUT_POST, 'PK_User'));
                $myUsuario->setNombre(filter_input(INPUT_POST, 'nombre'));
                $myUsuario->setApellido1(filter_input(INPUT_POST, 'apellido1'));
                $myUsuario->setApellido2(filter_input(INPUT_POST, 'apellido2'));
                $myUsuario->setCorreo_electronico(filter_input(INPUT_POST, 'correoElectronico'));
                $myUsuario->setFecha_nacimiento(filter_input(INPUT_POST, 'fecNacimiento'));
                $myUsuario->setCelular(filter_input(INPUT_POST, 'celular'));
                $myUsuario->setTelefono_trabajo(filter_input(INPUT_POST, 'celularOficina'));
                $myUsuario->setContrasena(filter_input(INPUT_POST, 'contrasegna'));
                $myUsuario->setDireccion(filter_input(INPUT_POST, 'direccion'));
                $myUsuario->setRol(false);
                
                if(obtener_usuario()!== null){
                    $myUsuario->setLastUser(obtener_usuario());
                    
                }else{
                    $myUsuario->setLastUser(filter_input(INPUT_POST, 'PK_User'));
                    
                }
                if ($action == "add_usuario") {
                    $myUsuarioBo->add($myUsuario);
                    echo('M~Registro Incluido Correctamente');
                }
            } else {
                echo('E~Los valores no fueron enviados');
            }
        }

        if ($action === "update_usuario") {
            if ((filter_input(INPUT_POST, 'PK_User') != null) && (filter_input(INPUT_POST, 'nombre') != null) &&
                    (filter_input(INPUT_POST, 'apellido1') != null) && (filter_input(INPUT_POST, 'apellido2') != null) &&
                    (filter_input(INPUT_POST, 'correoElectronico') != null) && (filter_input(INPUT_POST, 'fecNacimiento') != null) &&
                    (filter_input(INPUT_POST, 'celular') != null)) {

                $myUsuario->setNombre_Usuario(filter_input(INPUT_POST, 'PK_User'));
                $myUsuario->setNombre(filter_input(INPUT_POST, 'nombre'));
                $myUsuario->setApellido1(filter_input(INPUT_POST, 'apellido1'));
                $myUsuario->setApellido2(filter_input(INPUT_POST, 'apellido2'));
                $myUsuario->setCorreo_electronico(filter_input(INPUT_POST, 'correoElectronico'));
                $myUsuario->setFecha_nacimiento(filter_input(INPUT_POST, 'fecNacimiento'));
                $myUsuario->setCelular(filter_input(INPUT_POST, 'celular'));
                $myUsuario->setTelefono_trabajo(filter_input(INPUT_POST, 'celularOficina'));
                $myUsuario->setContrasena(filter_input(INPUT_POST, 'contrasegna'));
                $myUsuario->setDireccion(filter_input(INPUT_POST, 'direccion'));
                $myUsuario->setRol(false);
                $myUsuario->setLastUser(obtener_usuario());
                if ($action == "update_usuario") {
                    $myUsuarioBo->updateNormal($myUsuario);
                    $myUsuario = $myUsuarioBo->searchById($myUsuario);
                    echo('M~Registro Modificado Correctamente');
                    session_name("Sesion_Usuario");
                    session_start();
                    if (!(isset($_SESSION['userData']))) {
                        echo ("El atributo userData no existe en sesion, por favor inicia una sesion<br>");
                    } else {
                        $arreglo = $_SESSION['userData']; // obtiene el dato de la sesión
                        $arreglo = array($myUsuario->getNombre_Usuario(), $myUsuario->getNombre(),
                            $myUsuario->getApellido1(), $myUsuario->getApellido2(),
                            $myUsuario->getCelular(), $myUsuario->getCorreo_electronico(),
                            $myUsuario->getDireccion(), $myUsuario->getFecha_nacimiento(), $myUsuario->getTelefono_trabajo(),
                            $myUsuario->getRol());
                        $_SESSION['userData'] = $arreglo; // regresa el dato de la sesión
                    }
                }
            } else {
                echo('E~Los valores no fueron enviados');
            }
        }


        if ($action === "iniciar_session") {
            if ((filter_input(INPUT_POST, 'PK_Init_User') != null) && (filter_input(INPUT_POST, 'contrasegna') != null)) {
                $myUsuario->setNombre_Usuario(filter_input(INPUT_POST, "PK_Init_User"));
                $Password = filter_input(INPUT_POST, "contrasegna");
                if ($action === "iniciar_session") {
                    $myUsuario = $myUsuarioBo->searchById($myUsuario);
                    if ($myUsuario !== null) {
                        if ($myUsuario->getContrasena() === $Password) {
                            echo('M~Sesion iniciada de forma correcta.');
                            session_name("Sesion_Usuario");
                            session_start();
                            if (!(isset($_SESSION['userData']))) {
                                echo ("El atributo userData no existe en sesion y se procede a crearlo<br>");
                                $arreglo = array();
                                $_SESSION['userData'] = $arreglo;
                            } else {
                                echo ("El atributo userData existe en sesion<br>");
                            }
                            if (!(isset($_SESSION['userData']))) {
                                echo ("El atributo userData no existe en sesion, por favor inicia una sesion<br>");
                            } else {
                                $arreglo = $_SESSION['userData']; // obtiene el dato de la sesión
                                $arreglo = array($myUsuario->getNombre_Usuario(), $myUsuario->getNombre(),
                                    $myUsuario->getApellido1(), $myUsuario->getApellido2(),
                                    $myUsuario->getCelular(), $myUsuario->getCorreo_electronico(),
                                    $myUsuario->getDireccion(), $myUsuario->getFecha_nacimiento(), $myUsuario->getTelefono_trabajo(),
                                    $myUsuario->getRol());
                                $_SESSION['userData'] = $arreglo; // regresa el dato de la sesión
                            }
                        } else {
                            echo('E~Contraseña incorrecta');
                        }
                    } else {
                        echo('E~El usuario no existe');
                    }
                }
            } else {
                echo('E~Los valores no fueron enviados');
            }
        }


        if ($action === "show_info") {
            session_name('Sesion_Usuario');
            session_start();
            if (!(isset($_SESSION['userData']))) {
                echo ("E~No hay ninguna sesión iniciada.");
            } else {
                $arreglo = $_SESSION['userData']; // obtiene el dato de la sesión
                $json = '{"data":' . json_encode($arreglo) . '}';
                echo $json;
            }
        }

        if ($action === "showAll_usuario") {//accion de consultar todos los registros
            $resultDB = $myUsuarioBo->getAll();
            $json = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if ($resultDB->RecordCount() === 0) {
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        if ($action === "give_Admin") {
            if ((filter_input(INPUT_POST, 'PK_User') != null)) {
                $myUsuario->setNombre_Usuario(filter_input(INPUT_POST, 'PK_User'));
                $myUsuarioBo->giveAdmin($myUsuario);
                echo("M~Se han dado permisos a:" . $myUsuario->getNombre_Usuario());
            } else {
                echo('E~Los valores no fueron enviados');
            }
        }

        if ($action === "delete_Admin") {
            if ((filter_input(INPUT_POST, 'PK_User') != null)) {
                $myUsuario->setNombre_Usuario(filter_input(INPUT_POST, 'PK_User'));
                $myUsuarioBo->deleteAdmin($myUsuario);
                echo("M~Se han quitado los permisos a:" . $myUsuario->getNombre_Usuario());
            } else {
                echo('E~Los valores no fueron enviados');
            }
        }

        //***********************************************************
        //***********************************************************
//        if ($action === "showAll_personas") {//accion de consultar todos los registros
//            $resultDB   = $myPersonasBo->getAll();
//            $json       = json_encode($resultDB->GetArray());
//            $resultado = '{"data": ' . $json . '}';
//            if($resultDB->RecordCount() === 0){
//                $resultado = '{"data": []}';
//            }
//            echo $resultado;
//        }
        //***********************************************************
        //***********************************************************
//        if ($action === "show_personas") {//accion de mostrar cliente por ID
//            //se valida que los parametros hayan sido enviados por post
//            if (filter_input(INPUT_POST, 'PK_cedula') != null) {
//                $myPersonas->setPK_cedula(filter_input(INPUT_POST, 'PK_cedula'));
//                $myPersonas = $myPersonasBo->searchById($myPersonas);
//                if ($myPersonas != null) {
//                    echo json_encode(($myPersonas));
//                } else {
//                    echo('E~NO Existe un cliente con el ID especificado');
//                }
//            }
//        }
        //***********************************************************
        //***********************************************************
        if ($action === "delete_usuario") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_User') != null) {
                $myUsuario->setNombre_Usuario(filter_input(INPUT_POST, 'PK_User'));
                $myUsuarioBo->delete($myUsuario);
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
