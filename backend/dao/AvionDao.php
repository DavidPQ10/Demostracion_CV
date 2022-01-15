<?php

require_once("../utlis/adodb5/adodb.inc.php");
require_once("../domain/Avion.php");

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class AvionDao {

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

    public function add(Avion $Avion) {


        try {
            $sql = sprintf("insert into Avion (idAvion, Anio, Modelo, Marca,Filas, AsientosPorFila, LASTUSER, LASTMODIFICATION) 
                                          values (%s,%s,%s,%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("idAvion"),
                    $this->labAdodb->Param("Anio"),
                    $this->labAdodb->Param("Modelo"),
                    $this->labAdodb->Param("Marca"),
                    $this->labAdodb->Param("Fila"),
                    $this->labAdodb->Param("AsientosPorFila"),
                    $this->labAdodb->Param("LASTUSER"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idAvion"] = $Avion->getidAvion();
            $valores["Anio"] = $Avion->getAnio();
            $valores["Modelo"] = $Avion->getModelo();
            $valores["Marca"] = $Avion->getMarca();
            $valores["Fila"] = $Avion->getFilas();
            $valores["AsientosPorFila"] = $Avion->getColumnas();
            $valores["LASTUSER"] = $Avion->getLastUser();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase AvionDao), error:' . $e->getMessage());
        }
    }

    //***********************************************************
    //verifica si un Avion existe en la base de datos por ID
    //***********************************************************

    public function exist(Avion $Avion) {


        $exist = false;
        try {
            $sql = sprintf("select * from Avion where  idAvion = %s ",
                    $this->labAdodb->Param("idAvion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idAvion"] = $Avion->getidAvion();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase AvionDao), error:' . $e->getMessage());
        }
    }

    //***********************************************************
    //modifica un Avion en la base de datos
    //***********************************************************

    public function update(Avion $Avion) {


        try {
            $sql = sprintf("update Avion set Anio = %s, 
                                                Modelo = %s, 
                                                Marca = %s, 
                                                Filas = %s, 
                                                AsientosPorFila = %s, 
                                                LASTUSER = %s, 
                                                LASTMODIFICATION = CURDATE() 
                            where idAvion = %s",
                    $this->labAdodb->Param("Anio"),
                    $this->labAdodb->Param("Modelo"),
                    $this->labAdodb->Param("Marca"),
                    $this->labAdodb->Param("Filas"),
                    $this->labAdodb->Param("AsientosPorFila"),
                    $this->labAdodb->Param("LASTUSER"),
                    $this->labAdodb->Param("idAvion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Anio"] = $Avion->getAnio();
            $valores["Modelo"] = $Avion->getModelo();
            $valores["Marca"] = $Avion->getMarca();
            $valores["Filas"] = $Avion->getFilas();
            $valores["AsientosPorFila"] = $Avion->getColumnas();
            $valores["LASTUSER"] = $Avion->getLastUser();
            $valores["idAvion"] = $Avion->getidAvion();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase AvionDao), error:' . $e->getMessage());
        }
    }

    //***********************************************************
    //elimina un Avion en la base de datos
    //***********************************************************

    public function delete(Avion $Avion) {


        try {
            $sql = sprintf("delete from Avion where  idAvion = %s",
                    $this->labAdodb->Param("idAvion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idAvion"] = $Avion->getidAvion();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase AvionDao), error:' . $e->getMessage());
        }
    }

    //***********************************************************
    //busca a un Avion en la base de datos
    //***********************************************************

    public function searchById(Avion $Avion) {


        $returnAvion = null;
        try {
            $sql = sprintf("select * from Avion where  idAvion = %s",
                    $this->labAdodb->Param("idAvion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idAvion"] = $Avion->getidAvion();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $returnAvion = $Avion::createNullAvion();
                $returnAvion->setidAvion($resultSql->Fields("idAvion"));
                $returnAvion->setAnio($resultSql->Fields("Anio"));
                $returnAvion->setModelo($resultSql->Fields("Modelo"));
                $returnAvion->setMarca($resultSql->Fields("Marca"));
                $returnAvion->setFilas($resultSql->Fields("Filas"));
                $returnAvion->setColumnas($resultSql->Fields("AsientosPorFila"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase AvionDao), error:' . $e->getMessage());
        }
        return $returnAvion;
    }

    //***********************************************************
    //obtiene la información de el Avion en la base de datos
    //***********************************************************

    public function getAll() {


        try {
            $sql = sprintf("select idAvion, Anio, Modelo, Marca, Filas, AsientosPorFila, lastUser, lastModification from Avion");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase AvionDao), error:' . $e->getMessage());
        }
    }

}
