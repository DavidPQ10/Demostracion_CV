<?php

require_once("baseDomain.php");

class Reservacion extends BaseDomain implements \JsonSerializable {

    //attributes
    private $idReservacion;
    private $CheckIn;
    private $HoraCheckIn;
    private $Activo;
    private $Fecha_de_reservacion;
    private $Ruta_de_vuelo;
    private $Usuario;
    private $NumeroPasajeros;
    private $PrecioTotal;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullReservacion() {
        $instance = new self();
        return $instance;
    }

    public static function createReservacion($idReservacion, $CheckIn, $HoraCheckIn, $Activo, $Fecha_de_reservacion, $Ruta_de_vuelo, $Usuario,$PrecioTotal, $ultUsuario,$NumeroPasajeros, $ultModificacion) {
        $instance = new self();
        $instance->idReservacion = $idReservacion;
        $instance->CheckIn = $CheckIn;
        $instance->HoraCheckIn = $HoraCheckIn;
        $instance->Activo = $Activo;
        $instance->Fecha_de_reservacion = $Fecha_de_reservacion;
        $instance->Ruta_de_vuelo = $Ruta_de_vuelo;
        $instance->Usuario = $Usuario;
        $instance->PrecioTotal = $PrecioTotal;
        $instance->NumeroPasajeros = $NumeroPasajeros;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /*     * ************************************************************************* */

    //properties
    /*     * ************************************************************************* */
    public function getidReservacion() {
        return $this->idReservacion;
    }

    public function setidReservacion($idReservacion) {
        $this->idReservacion = $idReservacion;
    }

    
       public function getActivo() {
        return $this->Activo;
    }

    public function setActivo($Activo) {
        $this->Activo = $Activo;
    }

    
       public function getCheckIn() {
        return $this->CheckIn;
    }

    public function setCheckIn($checkIn) {
        $this->CheckIn = $checkIn;
    }

    /*     * ************************************************************************* */

    public function getHoraCheckIn() {
        return $this->HoraCheckIn;
    }

    public function setHoraCheckIn($HCheckIn) {
        $this->HoraCheckIn = $HCheckIn;
    }

    /*     * ************************************************************************* */

    public function getFecha_de_reservacion() {
        return $this->Fecha_de_reservacion;
    }

    public function setFecha_de_reservacion($Fecha_de_reservacion) {
        $this->Fecha_de_reservacion = $Fecha_de_reservacion;
    }

    /*     * ************************************************************************* */

    /*     * ************************************************************************* */
    /*     * ************************************************************************* */

    public function getRuta_de_vuelo() {
        return $this->Ruta_de_vuelo;
    }

    public function setRuta_de_vuelo($Ruta_de_vuelo) {
        $this->Ruta_de_vuelo = $Ruta_de_vuelo;
    }

    /*     * ************************************************************************* */

    public function getUsuario() {
        return $this->Usuario;
    }

    public function setUsuario($Usuario) {
        $this->Usuario = $Usuario;
    }

    /*     * ************************************************************************* */

    public function getUltUsuario() {
        return $this->ultUsuario;
    }

    public function setUltUsuario($ultUsuario) {
        $this->ultUsuario = $ultUsuario;
    }
    
    public function getNumeroPasajeros() {
        return $this->NumeroPasajeros;
    }

    public function setNumeroPasajeros($numPasajeros) {
        $this->NumeroPasajeros= $numPasajeros;
    }
    
    public function getPrecioTotal() {
        return $this->PrecioTotal;
    }

    public function setPrecioTotal($precioTotal) {
        $this->PrecioTotal = $precioTotal;
    }
    

    /*     * ************************************************************************* */

    //Convertir el obj a JSON
    /*     * ************************************************************************* */


    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
