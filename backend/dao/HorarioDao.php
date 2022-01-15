<?php

require_once("../utlis/adodb5/adodb.inc.php");
require_once("../domain/Horario.php");

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class HorarioDao {

    private $labAdodb;
    
    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        //$this->labAdodb->setCharset('utf8');
        //$this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost", "root2", "root2", "project");
        
    }

    //***********************************************************
    //agrega a un horario a la base de datos
    //***********************************************************

    public function add(Horario $Horario) {

        
        try {
            $sql = sprintf("insert into Horario (idHorario, Salida, Arrivo, LASTUSER, LASTMODIFICATION) 
                                          values (%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("idHorario"),
                    $this->labAdodb->Param("Salida"),
                    $this->labAdodb->Param("Arrivo"),
                    $this->labAdodb->Param("LASTUSER"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idHorario"]         = $Horario->getidHorario();
            $valores["Salida"]          = $Horario->getSalida();
            $valores["Arrivo"]          = $Horario->getArrivo();
            $valores["LASTUSER"]        = $Horario->getLastUser();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase HorarioDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si un hoario existe en la base de datos por ID
    //***********************************************************

    public function exist(Horario $Horario) {

        
        $exist = false;
        try {
            $sql = sprintf("select * from Horario where idHorario = %s ",
                            $this->labAdodb->Param("idHorario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idHorario"] = $Horario->getidHorario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase HorarioDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica un horario en la base de datos
    //***********************************************************

    public function update(Horario $Horario) {

        
        try {
            $sql = sprintf("update Horario set  Salida = %s, 
                                                Arrivo = %s, 
                                                LASTUSER = %s, 
                                                LASTMODIFICATION = CURDATE() 
                            where idHorario = %s",
                    $this->labAdodb->Param("Salida"),
                    $this->labAdodb->Param("Arrivo"),
                    $this->labAdodb->Param("LASTUSER"),
                    $this->labAdodb->Param("idHorario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Salida"]     = $Horario->getSalida();
            $valores["Arrivo"]     = $Horario->getArrivo();
            $valores["LASTUSER"]        = $Horario->getLastUser();
            $valores["idHorario"]     = $Horario->getidHorario();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase HorarioDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina un horario en la base de datos
    //***********************************************************

    public function delete(Horario $Horario) {

        
        try {
            $sql = sprintf("delete from Horario where  idHorario = %s",
                            $this->labAdodb->Param("idHorario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idHorario"] = $Horario->getidHorario();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase HorarioDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a un horario en la base de datos
    //***********************************************************

    public function searchById(Horario $Horario) {

        
        $returnHorario = null;
        try {
            $sql = sprintf("select * from Horario where  idHorario = %s",
                            $this->labAdodb->Param("idHorario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idHorario"] = $Horario->getidHorario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnHorario = Horario::createNullHorario();
                $returnHorario->setidHorario($resultSql->Fields("idHorario"));
                $returnHorario->setSalida($resultSql->Fields("Salida"));
                $returnHorario->setArrivo($resultSql->Fields("Arrivo"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase HorarioDao), error:'.$e->getMessage());
        }
        return $returnHorario;
    }

    //***********************************************************
    //obtiene la información de los horaio en la base de datos
    //***********************************************************
    
    public function getAll() {

        
        try {
            $sql = sprintf("select idHorario,Salida, Arrivo from Horario");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase HorarioDao), error:'.$e->getMessage());
        }
    }
    
}
