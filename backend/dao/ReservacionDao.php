<?php

require_once("../utlis/adodb5/adodb.inc.php");
require_once("../domain/Reservacion.php");

//this attribute enable to see the SQL's executed in the data base
//$this->labAdodb->debug=true;

class ReservacionDao {

    private $labAdodb;

    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        //$this->labAdodb->setCharset('utf8');
        //$this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost", "root2", "root2", "Project");
//        $this->labAdodb->debug=true;
    }

    //***********************************************************
    //agrega a un Reservacion a la base de datos
    //***********************************************************

    public function add(Reservacion $Reservacion) {


        try {
            $sql = sprintf("insert into Reservacion (Activo, FechaReservacion,CheckIn,Hora_CheckIn, Ruta_de_Vuelo, Usuario,NumeroPasajeros, PrecioTotal) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("Activo"),
                    $this->labAdodb->Param("FechaReservacion"),
                    $this->labAdodb->Param("CheckIn"),
                    $this->labAdodb->Param("Hora_CheckIn"),
                    $this->labAdodb->Param("Ruta_de_Vuelo"),
                    $this->labAdodb->Param("Usuario"),
                    $this->labAdodb->Param("NumeroPasajeros"),
                    $this->labAdodb->Param("PrecioTotal"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Activo"] = $Reservacion->getActivo();
            $valores["FechaReservacion"] = $Reservacion->getFecha_de_reservacion();
            $valores["CheckIn"] = $Reservacion->getCheckIn();
            $valores["Hora_CheckIn"] = $Reservacion->getHoraCheckIn();
            $valores["Ruta_de_Vuelo"] = $Reservacion->getRuta_de_vuelo();
            $valores["Usuario"] = $Reservacion->getUsuario();
            $valores["NumeroPasajeros"] = $Reservacion->getNumeroPasajeros();
            $valores["PrecioTotal"] = $Reservacion->getPrecioTotal();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase ReservacionDao), error:' . $e->getMessage());
        }
    }

    //***********************************************************
    //verifica si un Reservacion existe en la base de datos por ID
    //***********************************************************

    public function exist(Reservacion $Reservacion) {


        $exist = false;
        try {
            $sql = sprintf("select * from Reservacion where  idReservacion = %s ",
                    $this->labAdodb->Param("idReservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idReservacion"] = $Reservacion->getidReservacion();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase ReservacionDao), error:' . $e->getMessage());
        }
    }

    //***********************************************************
    //modifica un Reservacion en la base de datos
    //***********************************************************

    public function setCheckIn(Reservacion $Reservacion) {


        try {
            $sql = sprintf("update Reservacion set CheckIn = 1 
                            where idReservacion = %s",
                    $this->labAdodb->Param("idReservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idReservacion"] = $Reservacion->getidReservacion();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase ReservacionDao), error:' . $e->getMessage());
        }
    }

    //***********************************************************
    //elimina un Reservacion en la base de datos
    //***********************************************************

    public function delete(Reservacion $Reservacion) {


        try {
            $sql = sprintf("delete from Reservacion where  idReservacion = %s",
                    $this->labAdodb->Param("idReservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idReservacion"] = $Reservacion->getidReservacion();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase ReservacionDao), error:' . $e->getMessage());
        }
    }

    //***********************************************************
    //busca a un Reservacion en la base de datos
    //***********************************************************

    public function searchById(Reservacion $Reservacion) {


        $returnReservacion = null;
        try {
            $sql = sprintf("select * from Reservacion where  idReservacion = %s",
                    $this->labAdodb->Param("idReservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idReservacion"] = $Reservacion->getidReservacion();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $returnReservacion = $Reservacion::createNullReservacion();
                $returnReservacion->setidReservacion($resultSql->Fields("idReservacion"));
                $returnReservacion->setActivo($resultSql->Fields("Activo"));
                $returnReservacion->setFecha_de_reservacion($resultSql->Fields("FechaReservacion"));
                $returnReservacion->setHoraCheckIn($resultSql->Fields("Hora_CheckIn"));
                $returnReservacion->setCheckIn($resultSql->Fields("CheckIn"));
                $returnReservacion->setRuta_de_vuelo($resultSql->Fields("Ruta_de_Vuelo"));
                $returnReservacion->setUsuario($resultSql->Fields("Usuario"));
                $returnReservacion->setNumeroPasajeros($resultSql->Fields("NumeroPasajeros"));
                $returnReservacion->setPrecioTotal($resultSql->Fields("PrecioTotal"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase ReservacionDao), error:' . $e->getMessage());
        }
        return $returnReservacion;
    }
    
    
    
    
   /*************/
    

    //***********************************************************
    //obtiene la información de el Reservacion en la base de datos
    //***********************************************************

    public function getAll() {


        try {
            $sql = sprintf("select idReservacion, FechaReservacion, Ruta_de_Vuelo, Hora_CheckIn, CheckIn from Reservacion");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase ReservacionDao), error:' . $e->getMessage());
        }
    }
    
        public function getAllbyUser($User) {


        try {
            $sql = sprintf("select idReservacion, FechaReservacion, Ruta_de_Vuelo, Hora_CheckIn, CheckIn from Reservacion where Usuario = %s",
                    $this->labAdodb->Param('Usuario'));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idReservacion"] = $User;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase ReservacionDao), error:' . $e->getMessage());
        }
    }
    
    public function getAllbyUserCheckIn($User) {


        try {
            $sql = sprintf("select idReservacion, FechaReservacion, Ruta_de_Vuelo, Hora_CheckIn, CheckIn from Reservacion where Usuario = %s and CheckIn = 1",
                    $this->labAdodb->Param('Usuario'),);
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idReservacion"] = $User;
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase ReservacionDao), error:' . $e->getMessage());
        }
    }

}
