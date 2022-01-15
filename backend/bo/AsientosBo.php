<?php

require_once("../domain/Asientos.php");
require_once("../dao/AsientosDao.php");

class AsientosBo {

    private $AsientosDao;

    public function __construct() {
        $this->AsientosDao = new AsientosDao();
    }

    public function getAsientosDao() {
        return $this->AsientosDao;
    }

    public function setAsientosDao(AsientosDao $AsientosDao) {
        $this->AsientosDao = $AsientosDao;
    }

    //***********************************************************
    //agrega a un Avion a la base de datos
    //***********************************************************

    public function add(Asientos $Asientos) {
        try {
            if (!$this->AsientosDao->exist($Asientos)) {
                $this->AsientosDao->add($Asientos);
            } else {
                throw new Exception("El Avion ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a un Avion a la base de datos
    //***********************************************************

    public function update(Asientos $Asientos) {
        try {
            $this->AsientosDao->update($Asientos);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function setReservado(Asientos $Asientos) {
        try {
            $this->AsientosDao->setReservado($Asientos);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a un Avion a la base de datos
    //***********************************************************

    public function delete(Asientos $Asientos) {
        try {
            $this->AsientosDao->delete($Asientos);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a un Avion a la base de datos
    //***********************************************************

    public function searchById(Asientos $Asientos) {
        try {
            return $this->AsientosDao->searchById($Asientos);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas los Aviones de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->AsientosDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }
}

//end of the class AvionBo
?>
