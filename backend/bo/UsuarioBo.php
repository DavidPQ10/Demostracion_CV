<?php

require_once("../domain/Usuario.php");
require_once("../dao/UsuarioDao.php");

class UsuarioBo {

    private $UsuarioDao;

    public function __construct() {
        $this->UsuarioDao = new UsuarioDao();
    }

    public function getUsuarioDao() {
        return $this->UsuarioDao;
    }

    public function setUsuarioDao(UsuarioDao $UsuarioDao) {
        $this->UsuarioDao = $UsuarioDao;
    }

    //***********************************************************
    //agrega a un usuario a la base de datos
    //***********************************************************

    public function add(Usuario $Usuario) {
        try {
            if (!$this->UsuarioDao->exist($Usuario)) {
                $this->UsuarioDao->add($Usuario);
            } else {
                throw new Exception("El Usuario ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a un usuario a la base de datos
    //***********************************************************

    public function update(Usuario $Usuario) {
        try {
            $this->UsuarioDao->update($Usuario);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function updateNormal(Usuario $Usuario) {
        try {
            $this->UsuarioDao->updateNormal($Usuario);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a un usuario a la base de datos
    //***********************************************************

    public function delete(Usuario $Usuario) {
        try {
            $this->UsuarioDao->delete($Usuario);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a un usuario a la base de datos
    //***********************************************************

    public function searchById(Usuario $Usuario) {
        try {
            return $this->UsuarioDao->searchById($Usuario);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function giveAdmin(Usuario $Usuario) {
        try {
            return $this->UsuarioDao->giveAdmin($Usuario);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function deleteAdmin(Usuario $Usuario) {
        try {
            return $this->UsuarioDao->deleteAdmin($Usuario);
        } catch (Exception $e) {
            throw $e;
        }
    }
   

    //***********************************************************
    //consultar todas los Usuario de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->UsuarioDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class UsuarioBo
?>