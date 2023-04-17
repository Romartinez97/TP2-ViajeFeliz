<?php

class Pasajero{
  private $nombre;
  private $apellido;
  private $numeroDoc;
  private $telefono;
  
  public function __construct($nombreP, $apellidoP, $numeroDocP, $telefonoP){
    $this -> nombre = $nombreP;
    $this -> apellido = $apellidoP;
    $this -> numeroDoc = $numeroDocP;
    $this -> telefono = $telefonoP;
  }
  
  /*
  * Función de seteo de la variable $nombre
  */
  public function setNombreP($nombreP){
    $this -> nombre = $nombreP;
  }
  
  /*
  * Función para retornar la variable $nombre
  */
  public function getNombreP(){
    return $this -> nombre;
  }
    
  /*
  * Función de seteo de la variable $apellido
  */
  public function setApellidoP($apellidoP){
    $this -> apellido = $apellidoP;
  }
  
  /*
  * Función para retornar la variable $apellido
  */
  public function getApellidoP(){
    return $this -> apellido;
  }
  
  /*
  * Función de seteo de la variable $numeroDoc
  */
  public function setNumeroDoc($numeroDocP){
    $this -> numeroDoc = $numeroDocP;
  }
  
  /*
  * Función para retornar la variable $numeroDoc
  */
  public function getNumeroDoc(){
    return $this -> numeroDoc;
  }  
  
  /*
  * Función de seteo de la variable $telefono
  */
  public function setTelefono($telefonoP){
    $this -> telefono = $telefonoP;
  }
  
  /*
  * Función para retornar la variable $telefono
  */
  public function getTelefono(){
    return $this -> telefono;
  }
  
  public function __toString(){
    echo "\nPasajero ".$this->getNombreP()." ".$this->getApellidoP().", DNI N° ".$this->getNumeroDoc().", teléfono N° ".$this->getTelefono();  
  }
}
