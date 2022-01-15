<?php

require_once("../domain/Reservacion.php");
require_once("../dao/ReservacionDao.php");

class ReservacionBo {

    private $ReservacionDao;

    public function __construct() {
        $this->ReservacionDao = new ReservacionDao();
    }

    public function getReservacionDao() {
        return $this->ReservacionDao;
    }

    public function setReservacionDao(ReservacionDao $ReservacionDao) {
        $this->ReservacionDao = $ReservacionDao;
    }

    //***********************************************************
    //agrega a un Reservacion a la base de datos
    //***********************************************************

    public function add(Reservacion $Reservacion) {
        try {
            if (!$this->ReservacionDao->exist($Reservacion)) {
                $this->ReservacionDao->add($Reservacion);
            } else {
                throw new Exception("El Reservacion ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a un Reservacion a la base de datos
    //***********************************************************

    public function setCheckIn(Reservacion $Reservacion) {
        try {
            $this->ReservacionDao->setCheckIn($Reservacion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a un Reservacion a la base de datos
    //***********************************************************

    public function delete(Reservacion $Reservacion) {
        try {
            $this->ReservacionDao->delete($Reservacion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a un Reservacion a la base de datos
    //***********************************************************

    public function searchById(Reservacion $Reservacion) {
        try {
            return $this->ReservacionDao->searchById($Reservacion);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function searchByUser($User) {
        try {
            return $this->ReservacionDao->getAllbyUser($User);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function searchByUserCheckIn($User) {
        try {
            return $this->ReservacionDao->getAllbyUserCheckIn($User);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
 
    //***********************************************************
    //consultar todas las Reservaciones de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->ReservacionDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class ReservacionBo
?>