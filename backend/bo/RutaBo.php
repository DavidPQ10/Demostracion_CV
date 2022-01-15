<?php

require_once("../domain/Ruta.php");
require_once("../dao/RutaDao.php");

class RutaBo {

    private $RutaDao;

    public function __construct() {
        $this->RutaDao = new RutaDao();
    }

    public function getRutaDao() {
        return $this->RutaDao;
    }

    public function setRutaDao(RutaDao $RutaDao) {
        $this->RutaDao = $RutaDao;
    }

    //***********************************************************
    //agrega a un Ruta a la base de datos
    //***********************************************************

    public function add(Ruta $Ruta) {
        try {
            if (!$this->RutaDao->exist($Ruta)) {
                $this->RutaDao->add($Ruta);
            } else {
                throw new Exception("La Ruta ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una Ruta a la base de datos
    //***********************************************************

    public function update(Ruta $Ruta) {
        try {
            $this->RutaDao->update($Ruta);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una Ruta a la base de datos
    //***********************************************************

    public function delete(Ruta $Ruta) {
        try {
            $this->RutaDao->delete($Ruta);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una Ruta a la base de datos
    //***********************************************************

    public function searchById(Ruta $Ruta) {
        try {
            return $this->RutaDao->searchById($Ruta);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function getBusqueda() {
        try {
            return $this->RutaDao->getBusqueda();
        } catch (Exception $e) {
            throw $e;
        }
    }


    //***********************************************************
    //consultar todas las Rutas de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->RutaDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class RutaBo
?>