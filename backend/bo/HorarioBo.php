<?php

require_once("../domain/Horario.php");
require_once("../dao/HorarioDao.php");

class HorarioBo {

    private $HorarioDao;

    public function __construct() {
        $this->HorarioDao = new HorarioDao();
    }

    public function getHorarioDao() {
        return $this->HorarioDao;
    }

    public function setHorarioDao(HorarioDao $HorarioDao) {
        $this->HorarioDao = $HorarioDao;
    }

    //***********************************************************
    //agrega a un horario a la base de datos
    //***********************************************************

    public function add(Horario $Horario) {
        try {
            if (!$this->HorarioDao->exist($Horario)) {
                $this->HorarioDao->add($Horario);
            } else {
                throw new Exception("El hoaraio ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a un horario a la base de datos
    //***********************************************************

    public function update(Horario $Horario) {
        try {
            $this->HorarioDao->update($Horario);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a un horario a la base de datos
    //***********************************************************

    public function delete(Horario $Horario) {
        try {
            $this->HorarioDao->delete($Horario);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a un hoario a la base de datos
    //***********************************************************

    public function searchById(Horario $Horario) {
        try {
            return $this->HorarioDao->searchById($Horario);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas los horario de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->HorarioDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }
}

//end of the class HorarioBo
?>