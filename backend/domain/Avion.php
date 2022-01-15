<?php

require_once("baseDomain.php");

class Avion extends BaseDomain implements \JsonSerializable {

    //attributes
    private $idAvion;
    private $Anio;
    private $Modelo;
    private $Marca;
    private $Filas;
    private $Columnas;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullAvion() {
        $instance = new self();
        return $instance;
    }

    public static function createAvion($idAvion, $Anio, $Modelo, $Marca, $ultUsuario, $ultModificacion, $Filas, $Columnas) {
        $instance = new self();
        $instance->idAvion = $idAvion;
        $instance->Anio = $Anio;
        $instance->Modelo = $Modelo;
        $instance->Marca = $Marca;
        $instance->Filas = $Filas;
        $instance->Columnas = $Columnas;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /*     * ************************************************************************* */

    //properties
    /*     * ************************************************************************* */
    public function getidAvion() {
        return $this->idAvion;
    }

    public function setidAvion($idAvion) {
        $this->idAvion = $idAvion;
    }

    /*     * ************************************************************************* */

    public function getAnio() {
        return $this->Anio;
    }

    public function setAnio($Anio) {
        $this->Anio = $Anio;
    }

    /*     * ************************************************************************* */

    public function getModelo() {
        return $this->Modelo;
    }

    public function setModelo($Modelo) {
        $this->Modelo = $Modelo;
    }

    /*     * ************************************************************************* */

    public function getMarca() {
        return $this->Marca;
    }

    public function setMarca($Marca) {
        $this->Marca = $Marca;
    }
    
    public function getFilas() {
        return $this->Filas;
    }

    public function setFilas($Filas) {
        $this->Filas = $Filas;
    }
    public function getColumnas() {
        return $this->Columnas;
    }

    public function setColumnas($Columnas) {
        $this->Columnas = $Columnas;
    }
    

    /*     * ************************************************************************* */

    /*     * ************************************************************************* */

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
