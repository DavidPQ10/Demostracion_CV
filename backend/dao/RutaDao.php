<?php

require_once("../utlis/adodb5/adodb.inc.php");
require_once("../domain/Ruta.php");

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class RutaDao {

    private $labAdodb;
    
    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        //$this->labAdodb->setCharset('utf8');
        //$this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost", "root2", "root2", "Project");
        //$this->labAdodb->debug=true;
        
    }

    //***********************************************************
    //agrega a una Ruta a la base de datos
    //***********************************************************

    public function add(Ruta $Ruta) {
        
        
        try {
            $sql = sprintf("insert into Ruta_de_vuelo (idRuta_de_vuelo, Avion, Horario, Origen, Destino, Activo, Descuento, LASTUSER, LASTMODIFICATION, Subtotal) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,CURDATE(),%s)",
                    $this->labAdodb->Param("idRuta_de_vuelo"),
                    $this->labAdodb->Param("idAvion"),
                    $this->labAdodb->Param("idHorario"),
                    $this->labAdodb->Param("Origen"),
                    $this->labAdodb->Param("Destino"),
                    $this->labAdodb->Param("Activo"),
                    $this->labAdodb->Param("Descuento"),
                    $this->labAdodb->Param("LASTUSER"),
                    $this->labAdodb->Param("subTotal"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRuta_de_vuelo"]       = $Ruta->getidRuta_de_vuelo();
            $valores["idAvion"]               = $Ruta->getidAvion();
            $valores["idHorario"]             = $Ruta->getidHorario();
            $valores["Oregen"]                = $Ruta->getOrigen();
            $valores["Destino"]               = $Ruta->getDestino();
            $valores["Activo"]                = $Ruta->getActivo();
            $valores["Descuento"]             = $Ruta->getDescuento();
            $valores["LASTUSER"]              = $Ruta->getLastUser();
            $valores["subTotal"]              = $Ruta->getSubTotal();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase RutaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una Ruta existe en la base de datos por ID
    //***********************************************************

    public function exist(Ruta $Ruta) {

        
        $exist = false;
        try {
            $sql = sprintf("select * from Ruta_de_vuelo where  idRuta_de_vuelo = %s ",
                            $this->labAdodb->Param("idRuta_de_vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idRuta_de_vuelo"] = $Ruta->getidRuta_de_vuelo();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase RutaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una Ruta en la base de datos
    //***********************************************************

    public function update(Ruta $Ruta) {

        
        try {
            $sql = sprintf("update Ruta_de_vuelo set Avion = %s, 
                                                Horario = %s,
                                                Origen = %s, 
                                                Destino = %s, 
                                                Activo = %s, 
                                                Descuento = %s,  
                                                Subtotal = %s,
                                                LASTUSER = %s,
                                                LASTMODIFICATION = CURDATE()        
                            where idRuta_de_vuelo = %s ",
                    $this->labAdodb->Param("Avion"),
                    $this->labAdodb->Param("Horario"),
                    $this->labAdodb->Param("Origen"),
                    $this->labAdodb->Param("Destino"),
                    $this->labAdodb->Param("Activo"),
                    $this->labAdodb->Param("Descuento"),
                    $this->labAdodb->Param("Subtotal"),
                    $this->labAdodb->Param("LASTUSER"),                   
                    $this->labAdodb->Param("idRuta_de_vuelo"));          
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            
            $valores["Avion"]               = $Ruta->getidAvion();
            $valores["Horario"]             = $Ruta->getidHorario();
            $valores["Origen"]                = $Ruta->getOrigen();
            $valores["Destino"]               = $Ruta->getDestino();
            $valores["Activo"]                = $Ruta->getActivo();
            $valores["Descuento"]             = $Ruta->getDescuento();
            $valores["Subtotal"]             = $Ruta->getSubTotal();
            $valores["LASTUSER"]              = $Ruta->getLastUser();
            $valores["idRuta_de_vuelo"]       = $Ruta->getidRuta_de_vuelo();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase RutaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una Ruta en la base de datos
    //***********************************************************

    public function delete(Ruta $Ruta) {

        
        try {
            $sql = sprintf("delete from Ruta_de_vuelo where  idRuta_de_vuelo = %s",
                            $this->labAdodb->Param("idRuta_de_vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRuta_de_vuelo"] = $Ruta->getidRuta_de_vuelo();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase RutaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a uns Ruta en la base de datos
    //***********************************************************

    public function searchById(Ruta $Ruta) {

        
        $returnRuta = null;
        try {
            $sql = sprintf("select idRuta_de_vuelo, Avion, Horario, Origen, Destino, Subtotal, Activo, Descuento from Ruta_de_vuelo where  idRuta_de_vuelo = %s",
                            $this->labAdodb->Param("idRuta_de_vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRuta_de_vuelo"] = $Ruta->getidRuta_de_vuelo();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnRuta = $Ruta::createNullRuta();
                $returnRuta->setidRuta_de_vuelo($resultSql->Fields("idRuta_de_vuelo"));
                $returnRuta->setidAvion($resultSql->Fields("Avion"));
                $returnRuta->setidHorario($resultSql->Fields("Horario"));
                $returnRuta->setOrigen($resultSql->Fields("Origen"));
                $returnRuta->setDestino($resultSql->Fields("Destino"));
                $returnRuta->setSubTotal($resultSql->Fields("Subtotal"));
                $returnRuta->setActivo($resultSql->Fields("Activo"));
                $returnRuta->setDescuento($resultSql->Fields("Descuento"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase RutaDao), error:'.$e->getMessage());
        }
        return $returnRuta;
    }
    
    public function getBusqueda() {
        
        try {
            $sql = sprintf("select `ruta_de_vuelo`.`idRuta_de_vuelo`,`horario`.`salida`, `ruta_de_vuelo`.`origen`, `ruta_de_vuelo`.`destino`, `horario`.`arrivo`, `ruta_de_vuelo`.`subtotal`, `ruta_de_vuelo`.`descuento` from `ruta_de_vuelo` join `horario` on `ruta_de_vuelo`.`horario` = `horario`.`idHorario`");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase RutaDao), error:'.$e->getMessage());
        }
    }


    //***********************************************************
    //obtiene la información de la Ruta en la base de datos
    //***********************************************************
    
    public function getAll() {

        
        try {
            $sql = sprintf("select idRuta_de_vuelo, Origen, Destino, Avion, Horario, Descuento, Activo, Subtotal, lastUser from Ruta_de_vuelo");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase RutaDao), error:'.$e->getMessage());
        }
    }

}
