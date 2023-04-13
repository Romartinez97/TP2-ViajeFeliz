<?php

// La clase debe tener un método que cree pasajeros para pushearlos al arreglo y otros para modificarlos.
// Cada instancia de Viaje va a quedar en un arreglo ($listadoViajes). Si hago alguna modificación en un viaje, busco la instancia por el número de vuelo y hago un push
// en esa posición de modo que sobreescriba la información.


class Viaje
{
  private $codigo;
  private $destino;
  private $maxPasajeros;
  private $listaPasajeros;
  private $nombreP;
  private $apellidoP;
  private $numeroDocP;

  public function __construct($codigoViaje, $destinoViaje, $maxPasajerosViaje, $listaPasajerosViaje)
  {
    $this->codigo = $codigoViaje;
    $this->destino = $destinoViaje;
    $this->maxPasajeros = $maxPasajerosViaje;
    $this->listaPasajeros = $listaPasajerosViaje;
  }
  public function setCodigo($codigoViaje)
  {
    $this->codigo = $codigoViaje;
  }
  public function getCodigo()
  {
    return $this->codigo;
  }
  public function setDestino($destinoViaje)
  {
    $this->destino = $destinoViaje;
  }
  public function getDestino()
  {
    return $this->destino;
  }
  public function setMaxPasajeros($maxPasajerosViaje)
  {
    $this->maxPasajeros = $maxPasajerosViaje;
  }
  public function getMaxPasajeros()
  {
    return $this->maxPasajeros;
  }
  public function setListaPasajeros($listaPasajerosViaje)
  {
    $this->listaPasajeros = $listaPasajerosViaje;
  }
  public function getListaPasajeros()
  {
    return $this->listaPasajeros;
  }
  public function setNombreP($nombrePasajero)
  {
    $this->nombreP = $nombrePasajero;
  }
  public function getNombreP()
  {
    return $this->nombreP;
  }
  public function setApellidoP($apellidoPasajero)
  {
    $this->apellidoP = $apellidoPasajero;
  }
  public function getApellidoP()
  {
    return $this->apellidoP;
  }
  public function setNumeroDocP($numeroDocPasajero)
  {
    $this->numeroDocP = $numeroDocPasajero;
  }
  public function getNumeroDocP()
  {
    return $this->numeroDocP;
  }
}
