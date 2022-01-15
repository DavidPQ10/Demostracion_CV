<?php

require_once("baseDomain.php");

class Ruta extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idRuta_de_vuelo;
    private $Origen;
    private $Destino;
    private $Activo;
    private $Descuento;
    private $idAvion;
    private $idHorario;
    private $lastUser;
    private $lastModificacion;
    private $subTotal;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullRuta() {
        $instance = new self();
        return $instance;
    }

    public static function createRuta($idRuta_de_vuelo, $idAvion, $idHorario, $Origen, $Destino, $Activo, $Descuento,$subTotal, $ultUsuario, $ultModificacion) {
        $instance = new self();
        $instance->idRuta_de_vuelo       = $idRuta_de_vuelo;
        $instance->idAvion               = $idAvion;
        $instance->idHorario             = $idHorario;
        $instance->Origen                = $Origen;
        $instance->Destino               = $Destino;
        $instance->Activo                = $Activo;
        $instance->Descuento             = $Descuento;
        $instance->subTotal             = $subTotal;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidRuta_de_vuelo() {
        return $this->idRuta_de_vuelo;
    }

    public function setidRuta_de_vuelo($idRuta_de_vuelo) {
        $this->idRuta_de_vuelo = $idRuta_de_vuelo;
    }
    
    /****************************************************************************/

    public function getidAvion() {
        return $this->idAvion;
    }

    public function setidAvion($idAvion) {
        $this->idAvion = $idAvion;
    }

    /****************************************************************************/

    public function getidHorario() {
        return $this->idHorario;
    }

    public function setidHorario($idHorario) {
        $this->idHorario = $idHorario;
    }
    
    /****************************************************************************/

    public function getOrigen() {
        return $this->Origen;
    }

    public function setOrigen($Origen) {
        $this->Origen = $Origen;
    }

    /****************************************************************************/

    public function getDestino() {
        return $this->Destino;
    }

    public function setDestino($Destino) {
        $this->Destino = $Destino;
    }

    /****************************************************************************/
    /****************************************************************************/

    public function getActivo() {
        return $this->Activo;
    }

    public function setActivo($Activo) {
        $this->Activo = $Activo;
    }

    /****************************************************************************/

    public function getDescuento() {
        return $this->Descuento;
    }

    public function setDescuento($Descuento) {
        $this->Descuento = $Descuento;
    }
    
     public function getSubTotal() {
        return $this->subTotal;
    }

    public function setSubTotal($subTotal) {
        $this->subTotal = $subTotal;
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