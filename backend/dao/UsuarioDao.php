<?php

require_once("../utlis/adodb5/adodb.inc.php");
require_once("../domain/Usuario.php");


//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class UsuarioDao {

    private $labAdodb;
    
    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        //$this->labAdodb->setCharset('utf8');
        //$this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost", "root2", "root2", "project");
        //$this->labAdodb->debug=true;
        
    }

    //***********************************************************
    //agrega a un usuarui a la base de datos
    //***********************************************************

    public function add(Usuario $Usuario) {

        
        try {
            $sql = sprintf("insert into Usuario (Nombre_Usuario, Contrasena, Nombre, Apellido1, Apellido2, Direccion, Fecha_nacimiento, Celular, Telefono_trabajo, 
                            Correo_electronico, Fecha_registro, Rol, LASTUSER, LASTMODIFICATION) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,CURDATE(),%s,%s,CURDATE())",
                    $this->labAdodb->Param("Nombre_Usuario"),
                    $this->labAdodb->Param("Contrasena"),
                    $this->labAdodb->Param("Nombre"),
                    $this->labAdodb->Param("Apellido1"),
                    $this->labAdodb->Param("Apellido2"),
                    $this->labAdodb->Param("Direccion"),
                    $this->labAdodb->Param("Fecha_nacimiento"),
                    $this->labAdodb->Param("Celular"),
                    $this->labAdodb->Param("Telefono_trabajo"),
                    $this->labAdodb->Param("Correo_electronico"),
                    $this->labAdodb->Param("Rol"),
                    $this->labAdodb->Param("LASTUSER"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Nombre_Usuario"]       = $Usuario->getNombre_Usuario();
            $valores["Contrasena"]           = $Usuario->getContrasena();
            $valores["Nombre"]               = $Usuario->getNombre();
            $valores["Apellido1"]            = $Usuario->getApellido1();
            $valores["Apellido2"]            = $Usuario->getApellido2();
            $valores["Direccion"]            = $Usuario->getDireccion();
            $valores["Fecha_nacimiento"]     = $Usuario->getFecha_nacimiento();
            $valores["Celular"]              = $Usuario->getCelular();
            $valores["Telefono_trabajo"]     = $Usuario->getTelefono_trabajo();
            $valores["Correo_electronico"]   = $Usuario->getCorreo_electronico();
            $valores["Rol"]                  = $Usuario->getRol();
            $valores["LASTUSER"]             = $Usuario->getLastUser();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase UsuarioDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si un usuario existe en la base de datos por ID
    //***********************************************************

    public function exist(Usuario $Usuario) {

        
        $exist = false;
        try {
            $sql = sprintf("select * from Usuario where  Nombre_Usuario = %s ",
                            $this->labAdodb->Param("Nombre_Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre_Usuario"] = $Usuario->getNombre_Usuario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase UsuarioDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica un usuario en la base de datos
    //***********************************************************

    public function update(Usuario $Usuario) {

        
        try {
            $sql = sprintf("update Usuario set  Contrasena = %s,
                                                Nombre = %s, 
                                                Apellido1 = %s, 
                                                Apellido2 = %s, 
                                                Fecha_nacimiento = %s, 
                                                Direccion = %s, 
                                                Celular = %s, 
                                                Telefono_trabajo = %s, 
                                                Correo_electronico = %s, 
                                                Fecha_registro = %s, 
                                                Rol = %s, 
                                                LASTUSER = %s, 
                                                LASTMODIFICATION = CURDATE() 
                            where Nombre_Usuario = %s",
                    $this->labAdodb->Param("Contrasena"),
                    $this->labAdodb->Param("Nombre"),
                    $this->labAdodb->Param("Apellido1"),
                    $this->labAdodb->Param("Apellido2"),
                    $this->labAdodb->Param("Fecha_nacimiento"),
                    $this->labAdodb->Param("Direccion"),
                    $this->labAdodb->Param("Celular"),
                    $this->labAdodb->Param("Telefono_trabajo"),
                    $this->labAdodb->Param("Correo_electronico"),
                    $this->labAdodb->Param("Fecha_registro"),
                    $this->labAdodb->Param("Rol"),
                    $this->labAdodb->Param("LASTUSER"),
                    $this->labAdodb->Param("Nombre_Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Contrasena"]         = $Usuario->getContrasena();
            $valores["Nombre"]             = $Usuario->getNombre();
            $valores["Apellido1"]          = $Usuario->getApellido1();
            $valores["Apellido2"]          = $Usuario->getApellido2();
            $valores["Fecha_nacimiento"]   = $Usuario->getFecha_nacimiento();
            $valores["Direccion"]          = $Usuario->getDireccion();
            $valores["Celular"]            = $Usuario->getCelular();
            $valores["Telefono_trabajo"]   = $Usuario->getTelefono_trabajo();
            $valores["Correo_electronico"] = $Usuario->getCorreo_electronico();
            $valores["Fecha_registro"]     = $Usuario->getFecha_registro();
            $valores["Rol"]                = $Usuario->getRol();
            $valores["LASTUSER"]           = $Usuario->getLastUser();
            $valores["Nombre_Usuario"]     = $Usuario->getNombre_Usuario();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase UsuarioDao), error:'.$e->getMessage());
        }
    }
    
    public function updateNormal(Usuario $Usuario) {

        
        try {
            $sql = sprintf("update Usuario set 
                                                Nombre = %s, 
                                                Apellido1 = %s, 
                                                Apellido2 = %s, 
                                                Fecha_nacimiento = %s, 
                                                Celular = %s, 
                                                Telefono_trabajo = %s, 
                                                Correo_electronico = %s, 
                                                Fecha_registro = %s, 
                                                LASTUSER = %s, 
                                                LASTMODIFICATION = CURDATE() 
                            where Nombre_Usuario = %s",
                    $this->labAdodb->Param("Nombre"),
                    $this->labAdodb->Param("Apellido1"),
                    $this->labAdodb->Param("Apellido2"),
                    $this->labAdodb->Param("Fecha_nacimiento"),
                    $this->labAdodb->Param("Celular"),
                    $this->labAdodb->Param("Telefono_trabajo"),
                    $this->labAdodb->Param("Correo_electronico"),
                    $this->labAdodb->Param("Fecha_registro"),
                    $this->labAdodb->Param("LASTUSER"),
                    $this->labAdodb->Param("Nombre_Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre"]             = $Usuario->getNombre();
            $valores["Apellido1"]          = $Usuario->getApellido1();
            $valores["Apellido2"]          = $Usuario->getApellido2();
            $valores["Fecha_nacimiento"]   = $Usuario->getFecha_nacimiento();
            $valores["Celular"]            = $Usuario->getCelular();
            $valores["Telefono_trabajo"]   = $Usuario->getTelefono_trabajo();
            $valores["Correo_electronico"] = $Usuario->getCorreo_electronico();
            $valores["Fecha_registro"]     = $Usuario->getFecha_registro();
            $valores["LASTUSER"]           = $Usuario->getLastUser();
            $valores["Nombre_Usuario"]     = $Usuario->getNombre_Usuario();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase UsuarioDao), error:'.$e->getMessage());
        }
    }
    
    public function giveAdmin(Usuario $Usuario) {

        
        try {
            $sql = sprintf("update Usuario set 
                                                Rol = 1
                            where Nombre_Usuario = %s",
                    $this->labAdodb->Param("Nombre_Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre_Usuario"]     = $Usuario->getNombre_Usuario();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase UsuarioDao), error:'.$e->getMessage());
        }
    }
    
    public function deleteAdmin(Usuario $Usuario) {

        
        try {
            $sql = sprintf("update Usuario set 
                                                Rol = 0
                            where Nombre_Usuario = %s",
                    $this->labAdodb->Param("Nombre_Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre_Usuario"]     = $Usuario->getNombre_Usuario();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase UsuarioDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina un usuario en la base de datos
    //***********************************************************

    public function delete(Usuario $Usuario) {

        
        try {
            $sql = sprintf("delete from Usuario where  Nombre_Usuario = %s",
                            $this->labAdodb->Param("Nombre_Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Nombre_Usuario"] = $Usuario->getNombre_Usuario();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase UsuarioDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a un usuario en la base de datos
    //***********************************************************

    public function searchById(Usuario $Usuario) {

        
        $returnUsuario = null;
        try {
            $sql = sprintf("select * from Usuario where  Nombre_Usuario = %s",
                            $this->labAdodb->Param("Nombre_Usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Nombre_Usuario"] = $Usuario->getNombre_Usuario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnUsuario = Usuario::createNullUsuario();
                $returnUsuario->setNombre_Usuario($resultSql->Fields("Nombre_Usuario"));
                $returnUsuario->setContrasena($resultSql->Fields("Contrasena"));
                $returnUsuario->setNombre($resultSql->Fields("Nombre"));
                $returnUsuario->setApellido1($resultSql->Fields("Apellido1"));
                $returnUsuario->setApellido2($resultSql->Fields("Apellido2"));
                $returnUsuario->setFecha_nacimiento($resultSql->Fields("Fecha_nacimiento"));
                $returnUsuario->setDireccion($resultSql->Fields("Direccion"));
                $returnUsuario->setCelular($resultSql->Fields("Celular"));
                $returnUsuario->setTelefono_trabajo($resultSql->Fields("Telefono_trabajo"));
                $returnUsuario->setCorreo_electronico($resultSql->Fields("Correo_electronico"));
                $returnUsuario->setRol($resultSql->Fields("Rol"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase UsuarioDao), error:'.$e->getMessage());
        }
        return $returnUsuario;
    }

    //***********************************************************
    //obtiene la información de los usuarios en la base de datos
    //***********************************************************
    
    public function getAll() {

        
        try {
            $sql = sprintf("select Nombre_Usuario, Nombre, Apellido1, Apellido2, Fecha_nacimiento, Fecha_registro, Rol from  Usuario");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase UsuarioDao), error:'.$e->getMessage());
        }
    }

}
