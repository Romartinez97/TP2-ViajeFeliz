<?php

include_once("claseViaje.php");
include_once("clasePasajero.php");
include_once("claseResponsableV.php");

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Inicializa una colección de viajes para probar el código.
 * return array
 */
function iniciarListaViajes()
{
  // Viaje 1
  $responsable1 = new ResponsableV ("Maria", "Fernandez", "035789", "3546548");
  $listadoPasajeros = [];
  $pasajero1 = new Pasajero ("Juan", "Perez", "23456789", "2995123456");
  array_push ($listadoPasajeros, $pasajero1);
  $pasajero2 = new Pasajero ("Carlos", "Lopez", "12345678", "2995456789");
  array_push ($listadoPasajeros, $pasajero2);
  $viaje1 = new Viaje ("1001", "Buenos Aires", "30", $listadoPasajeros, $responsable1);
  
  // Viaje 2
  $responsable2 = new ResponsableV ("Julio", "Gomez", "478659", "2678450");
  $listadoPasajeros = [];
  $pasajero3 = new Pasajero ("Pedro", "Gonzalez", "45678123", "2995316487");
  array_push($listadoPasajeros, $pasajero3);
  $pasajero4 = new Pasajero ("Marta", "Diaz", "34156789", "2995486179");
  array_push($listadoPasajeros, $pasajero4);
  $viaje2 = new Viaje ("1002", "Catamarca", "25", $listadoPasajeros, $responsable2);
  
  $listadoViajes = [$viaje1, $viaje2];
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
    echo "\nEl dato requerido debe estar compuesto solo por letras: ";
    $palabra = trim(fgets(STDIN));
  }
  return $palabra;
}

/**
 * Función para verificar si un viaje ya existe. Si existe, retorna su posición en el array $listadoViajes.
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
 * Función para verificar si un pasajero ya está registrado. Si existe, retorna su posición en el array $listadoPasajeros.
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
