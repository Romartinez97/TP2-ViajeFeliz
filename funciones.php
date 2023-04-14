<?php

include_once("claseViaje.php");
include_once("clasePasajero.php");
include_once("claseResponsableV.php");
include_once("testViaje.php");

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Inicializa el arreglo en el que se van a almacenar todas las instancias de la clase Pasajero.
 * return array
 */
function iniciarListaPasajeros()
{
  $listadoPasajeros = [];
  return $listadoPasajeros;
}

/**
 * Inicializa el arreglo en el que se van a almacenar todas las instancias de la clase Viaje.
 * return array
 */
function iniciarListaViajes()
{
  $listadoViajes = [];
  return $listadoViajes;
}

/**
 * Muestra el menú de opciones para que el usuario interactue
 * @return int
 */
function seleccionarOpcion()
{
  //int $opcion
  echo "\n -------- MENÚ --------\n";
  echo "\n   1) Cargar información de un viaje.";
  echo "\n   2) Modificar información de un viaje.";
  echo "\n   3) Ver información de un viaje.";
  echo "\n   4) Salir.";
  do {
    echo "\nIngrese un número del 1 al 4 para elegir la opción: ";
    $opcion = trim(fgets(STDIN));
    if ($opcion <= 0 || $opcion > 4) {
      echo "\nPor favor, ingrese un número valido.\n";
    }
  } while ($opcion <= 0 || $opcion > 4);

  return $opcion;
}

/**
 * Función para verificar que la variable ingresada es numérica (entero) en su totalidad.
 * @return int
 */
function esNumero()
{
  //int $numero
  $numero = trim(fgets(STDIN));

  while (!is_numeric($numero)) {
    echo "\nEl dato requerido debe estar compuesto solo por números: ";
    $numero = trim(fgets(STDIN));
  }

  return $numero;

}

/**
 * Función para verificar que la variable ingresada es un string en su totalidad.
 * @return string
 */
function esString()
{
  //string $palabra
  $palabra = trim(fgets(STDIN));
  while (!ctype_alpha($palabra)) {
    echo "\nEl dato requerido debe estar compuesto solo por letras: ";
    $palabra = trim(fgets(STDIN));
  }
  return $palabra;
}

/**
 * Función para verificar si un viaje ya existe.
 * @return $int
 */
function esRepetido($codigoViaje, $listadoViajes)
{
  for ($i = 0; $i < count($listadoViajes); $i++) {
    if ($listadoViajes[$i]->getCodigo() == $codigoViaje) {
      return intval(key($listadoViajes));
    }
  }
  return -1;
}

/**
 * Función para verificar si un pasajero ya está registrado.
 * @return int
 */
function docRepetido($codigoViaje, $docPasajero, $listadoViajes)
{
  $posicion = esRepetido($codigoViaje, $listadoViajes);
  $pasajeros = $listadoViajes[$posicion]->getListaPasajeros();
  for ($j = 0; $j < count($pasajeros); $j++) {
    if ($pasajeros[$j]["numeroDoc"] == $docPasajero) {
      return intval(key($pasajeros));
    }
  }
  return -1;
}
