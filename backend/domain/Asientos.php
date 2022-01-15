<?php

require_once("baseDomain.php");

class Asientos extends BaseDomain implements \JsonSerializable {

    //attributes
    private $Nombre_Asiento;
    private $Fila;
    private $Columna;
    private $idReservacion;
    private $idUsuario;
    private $Reservado;
    private $lastUser;
    private $lastModificacion;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullAsiento() {
        $instance = new self();
        return $instance;
    }

    public static function createRuta($Nombre_Asiento, $Fila, $Columna, $idReservacion, $idUsuario, $Reservado, $ultUsuario, $ultModificacion) {
        $instance = new self();
        $instance->Nombre_Asiento = $Nombre_Asiento;
        $instance->Fila = $Fila;
        $instance->Columna = $Columna;
        $instance->idReservacion = $idReservacion;
        $instance->idUsuario = $idUsuario;
        $instance->Reservado = $Reservado;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /*     * ************************************************************************* */

    //properties
    /*     * ************************************************************************* */
    public function getNombre_Asiento() {
        return $this->Nombre_Asiento;
    }

    public function setNombre_Asiento($Nombre_Asiento) {
        $this->Nombre_Asiento = $Nombre_Asiento;
    }

    /*     * ************************************************************************* */

    public function getFila() {
        return $this->Fila;
    }

    public function setFila($Fila) {
        $this->Fila = $Fila;
    }

    /*     * ************************************************************************* */

    public function getColumna() {
        return $this->Columna;
    }

    public function setColuman($Columna) {
        $this->Columna = $Columna;
    }

    /*     * ************************************************************************* */

    /*     * ************************************************************************* */

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($IdUsurio) {
        $this->idUsuario = $IdUsurio;
    }

    /*     * ************************************************************************* */
    /*     * ************************************************************************* */

    public function getReservacion() {
        return $this->idReservacion;
    }

    public function setReservacion($Reservacion) {
        $this->idReservacion = $Reservacion;
    }

    /*     * ************************************************************************* */

    public function getReservado() {
        return $this->Reservado;
    }

    public function setReservado($Reservado) {
        $this->Reservado = $Reservado;
    }


    /*     * ************************************************************************* */

    public function getUltUsuario() {
        return $this->ultUsuario;
    }

    public function setUltUsuario($ultUsuario) {
        $this->ultUsuario = $ultUsuario;
    }

    /*     * ************************************************************************* */

    //Convertir el obj a JSON
    /*     * ************************************************************************* */


    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
