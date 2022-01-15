<?php

require_once("baseDomain.php");

class Horario extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idHorario;
    private $Salida;
    private $Arrivo;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullHorario() {
        $instance = new self();
        return $instance;
    }

    public static function createHorario($idHorario, $Salida, $Arrivo, $ultUsuario, $ultModificacion, $lastUser, $lastModification) {
        $instance = new self();
        $instance->idHorario      = $idHorario;
        $instance->Salida         = $Salida;
        $instance->Arrivo         = $$Arrivo;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidHorario() {
        return $this->idHorario;
    }

    public function setidHorario($idHorario) {
        $this->idHorario = $idHorario;
    }

    /****************************************************************************/

    /****************************************************************************/

    public function getSalida() {
        return $this->Salida;
    }

    public function setSalida($Salida) {
        $this->Salida = $Salida;
    }

    /****************************************************************************/

    public function getArrivo() {
        return $this->Arrivo;
    }

    public function setArrivo($Arrivo) {
        $this->Arrivo = $Arrivo;
    }

    /****************************************************************************/

    public function getUltUsuario() {
        return $this->ultUsuario;
    }

    public function setUltUsuario($ultUsuario) {
        $this->ultUsuario = $ultUsuario;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}