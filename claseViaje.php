<?php

class Viaje
{
  private $codigo;
  private $destino;
  private $maxPasajeros;
  private $listaPasajeros;
  private $responsableViaje

  public function __construct($codigoViaje, $destinoViaje, $maxPasajerosViaje, $listaPasajerosViaje)
  {
    $this->codigo = $codigoViaje;
    $this->destino = $destinoViaje;
    $this->maxPasajeros = $maxPasajerosViaje;
    $this->listaPasajeros = $listaPasajerosViaje;
  }
  
  /*
  * Función de seteo de la variable $codigo
  */
  public function setCodigo($codigoViaje)
  {
    $this->codigo = $codigoViaje;
  }
  
  /*
  * Función para retornar la variable $codigo
  */
  public function getCodigo()
  {
    return $this->codigo;
  }
  
  /*
  * Función de seteo de la variable $destino
  */
  public function setDestino($destinoViaje)
  {
    $this->destino = $destinoViaje;
  }
  
  /*
  * Función para retornar la variable $destino
  */
  public function getDestino()
  {
    return $this->destino;
  }
  
  /*
  * Función de seteo de la variable $maxPasajeros
  */
  public function setMaxPasajeros($maxPasajerosViaje)
  {
    $this->maxPasajeros = $maxPasajerosViaje;
  }
  
  /*
  * Función para retornar la variable $maxPasajeros
  */
  public function getMaxPasajeros()
  {
    return $this->maxPasajeros;
  }
  
  /*
  * Función de seteo de la variable $listaPasajeros
  */
  public function setListaPasajeros($listaPasajerosViaje)
  {
    $this->listaPasajeros = $listaPasajerosViaje;
  }
  
  /*
  * Función para retornar la variable $listaPasajeros
  */
  public function getListaPasajeros()
  {
    return $this->listaPasajeros;
  }
  /*
  * Función de seteo de la variable $responsableViaje
  */
  public function setResponsableViaje($responsableV)
  {
    $this->responsableViaje = $responsableV;
  }
  
  /*
  * Función para retornar la variable $resposableViaje
  */
  public function getResponsableViaje()
  {
    return $this->responsableViaje;
  }
  
  public function __toString{
    "\nSe registró el vuelo N° ".$this->getCodigo().", con destino a ".$this->getDestino()." y con ".count($this->getListaPasajeros())."/".$this->getMaxPasajeros." pasajeros registrados";
  }
}
