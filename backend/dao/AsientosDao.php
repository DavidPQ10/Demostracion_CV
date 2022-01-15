<?php

require_once("../utlis/adodb5/adodb.inc.php");
require_once("../domain/Asientos.php");

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class AsientosDao {

    private $labAdodb;
    
    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        //$this->labAdodb->setCharset('utf8');
        //$this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost", "root2", "root2", "Project");
       // $this->labAdodb->debug=true;
        
    }

    //***********************************************************
    //agrega a un Avion a la base de datos
    //***********************************************************

    public function add(Asientos $Asientos) {
        
        
        try {
            $sql = sprintf("insert into Asientos (Nombre_Asiento, Fila, Columna, idReservacion, Usuario, Reservado) 
                                          values (%s,%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("Nombre_Asiento"),
                    $this->labAdodb->Param("Fila"),
                    $this->labAdodb->Param("Columna"),
                    $this->labAdodb->Param("idReservacion"),
                    $this->labAdodb->Param("Usuario"),
                    $this->labAdodb->Param("Reservado"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Nombre_Asiento"]           = $Asientos->getNombre_Asiento();
            $valores["Fila"]                = $Asientos->getFila();
            $valores["Columna"]             = $Asientos->getColumna();
            $valores["idReservacion"]       = $Asientos->getReservacion();
            $valores["Usuario"]             = $Asientos->getIdUsuario();
            $valores["Reservado"]           = $Asientos->getReservado();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase AvionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si un Avion existe en la base de datos por ID
    //***********************************************************

    public function exist(Asientos $Asientos) {

        
        $exist = false;
        try {
            $sql = sprintf("select * from Asientos where Nombre_Asiento = %s ",
                            $this->labAdodb->Param("Nombre_Asiento"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre_Asiento"] = $Asientos->getNombre_Asiento();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase AvionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica un Avion en la base de datos
    //***********************************************************

    public function update(Asientos $Asientos) {

        
        try {
            $sql = sprintf("update Asientos set 
                                                Fila = %s, 
                                                Columna = %s, 
                                                Nombre_Asiento = %s, 
                                                idReservacion = %s, 
                                                Usuario = %s, 
                                                Reservado = %s, 
                            where idAvion = %s",
                    $this->labAdodb->Param("Fila"),
                    $this->labAdodb->Param("Columna"),
                    $this->labAdodb->Param("Nombre_Asiento"),
                    $this->labAdodb->Param("idReservacion"),
                    $this->labAdodb->Param("Usuario"),
                    $this->labAdodb->Param("Reservado"),
                    $this->labAdodb->Param("idAvion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Fila"]                    = $Asientos->getFila();
            $valores["Columna"]                 = $Asientos->getColumna();
            $valores["Nombre_Asiento"]          = $Asientos->getNombre_Asiento();
            $valores["idReservacion"]           = $Asientos->getReservacion();
            $valores["Usuario"]                 = $Asientos->getIdUsuario();
            $valores["Reservado"]               = $Asientos->getReservado();
            $valores["idAvion"]               = $Asientos->getIdAvion();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase AvionDao), error:'.$e->getMessage());
        }
    }
    
    public function setReservado(Asientos $Asientos) {

        
        try {
            $sql = sprintf("update Asientos set 
                                                idReservacion = %s, 
                                                Usuario = %s, 
                                                Reservado = %s 
                            where Nombre_Asiento = %s",
                    $this->labAdodb->Param("idReservacion"),
                    $this->labAdodb->Param("Usuario"),
                    $this->labAdodb->Param("Reservado"),
                    $this->labAdodb->Param("Nombre_Asiento"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
           
            $valores["idReservacion"]           = $Asientos->getReservacion();
            $valores["Usuario"]                 = $Asientos->getIdUsuario();
            $valores["Reservado"]               = $Asientos->getReservado();
             $valores["Nombre_Asiento"]          = $Asientos->getNombre_Asiento();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase AvionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina un Avion en la base de datos
    //***********************************************************

    public function delete(Asientos $Asientos) {

        
        try {
            $sql = sprintf("delete from Asientos where Nombre_Asiento = %s",
                            $this->labAdodb->Param("Nombre_Asiento"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre_Asiento"] = $Asientos->getNombre_Asiento();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase AvionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a un Avion en la base de datos
    //***********************************************************

    public function searchById(Asientos $Asientos) {

        
        $returnAsiento = null;
        try {
            $sql = sprintf("select * from Asientos where Nombre_Asiento = %s",
                            $this->labAdodb->Param("Nombre_Asiento"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Nombre_Asiento"] = $Asientos->getNombre_Asiento();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnAsiento = $Asientos::createNullAsiento();
                $returnAsiento->setNombre_Asiento($resultSql->Fields("Nombre_Asiento"));
                $returnAsiento->setFila($resultSql->Fields("Fila"));
                $returnAsiento->setColuman($resultSql->Fields("Columna"));
                $returnAsiento->setReservacion($resultSql->Fields("idReservacion"));
                $returnAsiento->setIdUsuario($resultSql->Fields("Usuario"));
                $returnAsiento->setReservado($resultSql->Fields("Reservado"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase AvionDao), error:'.$e->getMessage());
        }
        return $returnAsiento;
    }

    //***********************************************************
    //obtiene la información de el Avion en la base de datos
    //***********************************************************
    
    public function getAll() {

        
        try {
            $sql = sprintf("select * from Asientos");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase AvionDao), error:'.$e->getMessage());
        }
    }
}

