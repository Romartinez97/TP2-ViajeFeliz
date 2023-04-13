<?php

class ResponsableV{
  private $nombre;
  private $apellido;
  private $numEmpleado;
  private $numLicencia;
  
  public function __construct($nombreR, $apellidoR, $numEmpleadoR, $numLicenciaR){
    $this -> nombre = $nombreR;
    $this -> apellido = $apellidoR;
    $this -> numEmpleado = $numEmpleadoR;
    $this -> numLicencia = $numLicenciaR;
  }
  
  /*
  * Función de seteo de la variable $nombre
  */
  public function setNombre($nombreP){
    $this -> nombre = $nombreP;
  }
  
  /*
  * Función para retornar la variable $nombre
  */
  public function getNombre(){
    return $this -> nombre;
  }
    
  /*
  * Función de seteo de la variable $apellido
  */
  public function setApellido($apellidoP){
    $this -> apellido = $apellidoP;
  }
  
  /*
  * Función para retornar la variable $apellido
  */
  public function getApellido(){
    return $this -> apellido;
  }
  
  /*
  * Función de seteo de la variable $numEmpleado
  */
  public function setNumEmpleado($numEmpleadoR){
    $this -> numEmpleado = $numEmpleadoR;
  }
  
  /*
  * Función para retornar la variable $numEmpleado
  */
  public function getNumEmpleado(){
    return $this -> numEmpleado;
  }  
  
  /*
  * Función de seteo de la variable $numLicencia
  */
  public function setNumLicencia($numLicenciaR){
    $this -> numLicencia = $numLicenciaR;
  }
  
  /*
  * Función para retornar la variable $numLicencia
  */
  public function getNumLicencia(){
    return $this -> numLicencia;
  }
  
  public function __toString(){
    echo "El empleado responsable del viaje es ".$this->getNombre()." ".$this->getApellido().", número de empleado ".$this->getNumEmpleado().", número de licencia ".$this->getTelefono();  
  }
}
