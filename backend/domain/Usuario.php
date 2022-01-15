<?php

require_once("baseDomain.php");

class Usuario extends BaseDomain implements \JsonSerializable{

    //attributes
    private $Nombre_Usuario;
    private $Contrasena;
    private $Nombre;
    private $Apellido1;
    private $Apellido2;
    private $Fecha_nacimiento;
    private $Direccion;
    private $Celular;
    private $Telefono_trabajo;
    private $Correo_electronico;
    private $Rol;
    private $lastUser;
    private $lastModification;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullUsuario() {
        $instance = new self();
        return $instance;
    }

    public static function createUsuario($Nombre_Usuario, $Contrasena, $Nombre, $Apellido1, $Apellido2, $Fecha_nacimiento, $Direccion, $Celular, $Correo_electronico, $Telefono_trabajo, $Rol, $ultUsuario, $ultModificacion) {
        $instance = new self();
        $instance->Nombre_Usuario       = $Nombre_Usuario;
        $instance->Contrasena           = $Contrasena;
        $instance->Nombre               = $Nombre;
        $instance->Apellido1            = $Apellido1;
        $instance->Apellido2            = $Apellido2;
        $instance->Fecha_nacimiento     = $Fecha_nacimiento;
        $instance->Direccion            = $Direccion;
        $instance->Celular              = $Celular;
        $instance->Telefono_trabajo     = $Telefono_trabajo;
        $instance->Correo_electronico   = $Correo_electronico;
        $instance->Rol                  = $Rol;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    
    public function getNombre_Usuario() {
        return $this->Nombre_Usuario;
    }

    public function setNombre_Usuario($Nombre_Usuario) {
        $this->Nombre_Usuario = $Nombre_Usuario;
    }

    /****************************************************************************/
    
    public function getContrasena() {
        return $this->Contrasena;
    }

    public function setContrasena($Contrasena) {
        $this->Contrasena = $Contrasena;
    }

    /****************************************************************************/

    public function getNombre() {
        return $this->Nombre;
    }

    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    /****************************************************************************/

    public function getApellido1() {
        return $this->Apellido1;
    }

    public function setApellido1($Apellido1) {
        $this->Apellido1 = $Apellido1;
    }

    /****************************************************************************/

    public function getApellido2() {
        return $this->Apellido2;
    }

    public function setApellido2($Apellido2) {
        $this->Apellido2 = $Apellido2;
    }

    /****************************************************************************/

    public function getFecha_nacimiento() {
        return $this->Fecha_nacimiento;
    }

    public function setFecha_nacimiento($Fecha_nacimiento) {
        $this->Fecha_nacimiento = $Fecha_nacimiento;
    }

    /****************************************************************************/

    public function getDireccion() {
        return $this->Direccion;
    }

    public function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }
    
    /****************************************************************************/
    
    public function getCelular() {
        return $this->Celular;
    }

    public function setCelular($Celular) {
        $this->Celular = $Celular;
    }

    /****************************************************************************/

    public function getTelefono_trabajo() {
        return $this->Telefono_trabajo;
    }

    public function setTelefono_trabajo($Telefono_trabajo) {
        $this->Telefono_trabajo = $Telefono_trabajo;
    }

    /****************************************************************************/
    
    public function getCorreo_electronico() {
        return $this->Correo_electronico;
    }

    public function setCorreo_electronico($Correo_electronico) {
        $this->Correo_electronico = $Correo_electronico;
    }

    /****************************************************************************/
    
    public function getRol() {
        return $this->Rol;
    }

    public function setRol($Rol) {
        $this->Rol = $Rol;
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