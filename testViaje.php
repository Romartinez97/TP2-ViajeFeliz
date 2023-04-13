<?php

include_once("claseViaje.php");
include_once("funciones.php");

/**************************************/
/********* PROGRAMA PRINCIPAL *********/
/**************************************/

$listadoPasajeros = iniciarListaPasajeros();
$listadoViajes = iniciarListaViajes();

do {
  $opcion = seleccionarOpcion();
  switch ($opcion) {
    case 1:
      //Cargar información del viaje.
      echo "\nIngrese el código del viaje: ";
      $codigoViaje = esNumero();
      while ((esRepetido($codigoViaje, $listadoViajes)) >= 0) {
        echo "\nEl código ingresado corresponde a un viaje ya registrado. Ingrese un código válido: ";
        $codigoViaje = esNumero();
      }
      echo "\nIngrese el destino: ";
      $destinoViaje = esString();
      echo "\nIngrese la cantidad máxima de pasajeros permitidos: ";
      $maxPasajerosViaje = esNumero();
      $viaje = new Viaje($codigoViaje, $destinoViaje, $maxPasajerosViaje, $listadoViajes);
      echo "\n¿Desea ingresar los datos de un pasajero? (S/N) ";
      $respuesta = trim(fgets(STDIN));
      $respuesta = strtolower($respuesta);
      while ($respuesta != "s" && $respuesta != "n") {
        echo "\nIndique si desea (S) o no (N) agregar a un pasajero: ";
        $respuesta = trim(fgets(STDIN));
        $respuesta = strtolower($respuesta);
      }
      while ($respuesta == "s") {
        if (count($listadoPasajeros) == $maxPasajerosViaje) {
          echo "\nEl viaje ya llegó al límite de pasajeros a bordo, no se permite el ingreso de otro más.";
          $respuesta = "n";
        } else {
          $pasajero = agregarPasajero($viaje);
          array_push($listadoPasajeros, $pasajero);
          echo "\nSe agregó al pasajero " . $viaje->getNombreP() . " " . $viaje->getApellidoP() . ", DNI " . $viaje->getNumeroDocP() . " al registro de pasajeros del viaje.";
          echo "\n¿Desea ingresar los datos de otro pasajero? (S/N): ";
          $respuesta = trim(fgets(STDIN));
          $respuesta = strtolower($respuesta);
          while ($respuesta != "s" && $respuesta != "n") {
            echo "\nIndique si desea (S) o no (N) agregar a un pasajero: ";
            $respuesta = trim(fgets(STDIN));
            $respuesta = strtolower($respuesta);
          }
        }
      }
      $viaje->setListaPasajeros($listadoPasajeros);
      array_push($listadoViajes, $viaje);
      break;
    case 2:
      //Modificar información del viaje.
      echo "\nIngrese el código del viaje a modificar: ";
      $codigoViaje = esNumero();
      while (esRepetido($codigoViaje, $listadoViajes) < 0) {
        echo "\nEl código ingresado no corresponde a ningún viaje registrado. Ingrese un código válido: ";
        $codigoViaje = esNumero();
      }
      echo "\n   1) Modificar información del viaje.";
      echo "\n   2) Modificar información de un pasajero.";
      echo "\n   3) Volver al menú anterior.";
      do {
        echo "\nIngrese un número del 1 al 3 para elegir la opción: ";
        $opcion = trim(fgets(STDIN));
        if ($opcion <= 0 || $opcion > 3) {
          echo "\nPor favor, ingrese un número valido.\n";
        }
      } while ($opcion <= 0 || $opcion > 3);
      switch ($opcion) {
        case 1:
          echo "\n   1) Modificar código del viaje.";
          echo "\n   2) Modificar destino del viaje.";
          echo "\n   3) Modificar número máximo de pasajeros del viaje.";
          echo "\n   4) Volver al menú anterior.";
          do {
            echo "\nIngrese un número del 1 al 4 para elegir la opción: ";
            $opcion = trim(fgets(STDIN));
            if ($opcion <= 0 || $opcion > 4) {
              echo "\nPor favor, ingrese un número valido.\n";
            }
          } while ($opcion <= 0 || $opcion > 4);
          switch ($opcion) {
            case 1:
              echo "\nIngrese el código nuevo: ";
              $codigoNuevo = trim(fgets(STDIN));
              $posicionActual = esRepetido($codigoNuevo, $listadoViajes);
              if ($posicionActual == -1) {
                $posicionActual = esRepetido($codigoViaje, $listadoViajes);
                $listadoViajes[$posicionActual]->setCodigo($codigoNuevo);
                echo "\nEl nuevo código es " . $listadoViajes[$posicionActual]->getCodigo() . ".";
              }
              break;
            case 2:
              echo "\nIngrese el nuevo destino: ";
              $destinoNuevo = esString();
              $posicionActual = esRepetido($codigoViaje, $listadoViajes);
              $listadoViajes[$posicionActual]->setDestino($destinoNuevo);
              echo "\nEl nuevo destino es " . $listadoViajes[$posicionActual]->getDestino() . ".";
              break;
            case 3:
              echo "\nIngrese el nuevo número máximo de pasajeros: ";
              $numMaxNuevo = esNumero();
              $posicionActual = esRepetido($codigoViaje, $listadoViajes);
              $listadoViajes[$posicionActual]->setMaxPasajeros($numMaxNuevo);
              echo "\nEl nuevo número máximo de pasajeros es " . $listadoViajes[$posicionActual]->getMaxPasajeros() . ".";
              break;
            default:
              break;
          }
          break;
        case 2:

          echo "\nIngrese el documento del pasajero a modificar (sin puntos): ";
          $documentoPasajero = esNumero();
          while (docRepetido($codigoViaje, $documentoPasajero, $listadoViajes) < 0) {
            echo "\nEl documento ingresado no corresponde a ningún pasajero registrado en este viaje. Ingrese un documento válido:";
            $documentoPasajero = esNumero();
          }
          echo "\n   1) Modificar nombre y apellido del pasajero.";
          echo "\n   2) Modificar documento del pasajero.";
          echo "\n   3) Volver al menú anterior.";
          do {
            echo "\nIngrese un número del 1 al 3 para elegir la opción: ";
            $opcion = trim(fgets(STDIN));
            if ($opcion <= 0 || $opcion > 3) {
              echo "\nPor favor, ingrese un número valido.\n";
            }
          } while ($opcion <= 0 || $opcion > 3);

          switch ($opcion) { //En todos los cases tengo que hacer un recorrido parcial hasta ubicar el número de documento del pasajero en el array $listadoPasajeros
            case 1:
              echo "\nIngrese el nuevo nombre y apellido del pasajero.";
              echo "\nNombre: ";
              $nombreNuevo = esString();
              echo "\nApellido: ";
              $apellidoNuevo = esString();
              $posicionActual = esRepetido($codigoViaje, $listadoViajes);
              $posicionPersona = docRepetido($codigoViaje, $documentoPasajero, $listadoViajes);
              $dataPasajeros = $listadoViajes[$posicionActual]->getListaPasajeros();
              $dataPasajeros[$posicionPersona]["nombre"] = $nombreNuevo;
              $dataPasajeros[$posicionPersona]["apellido"] = $apellidoNuevo;
              $listadoViajes[$posicionActual]->setListaPasajeros($dataPasajeros);
              echo "\nEl nuevo nombre y apellido del pasajero es " . $dataPasajeros[$posicionPersona]["nombre"] . " " . $dataPasajeros[$posicionPersona]["apellido"] . ".";
              break;
            case 2:

              echo "\nIngrese el nuevo número de documento del pasajero (sin puntos): ";
              $nuevoDocumento = esNumero();
              $posicionActual = esRepetido($codigoViaje, $listadoViajes);
              $posicionPersona = docRepetido($codigoViaje, $documentoPasajero, $listadoViajes);
              $dataPasajeros = $listadoViajes[$posicionActual]->getListaPasajeros();
              $dataPasajeros[$posicionPersona]["numeroDoc"] = $nuevoDocumento;
              $listadoViajes[$posicionActual]->setListaPasajeros($dataPasajeros);
              echo "\nEl nuevo documento del pasajero es " . $dataPasajeros[$posicionPersona]["numeroDoc"] . ".";
              break;
            default:
              break;
          }
          break;
      }
      break;
    case 3:
      //Ver información de un viaje.
      echo "\nIngrese el código del viaje del cual desea ver la información: ";
      $codigoViaje = esNumero();
      $posicionActual = esRepetido($codigoViaje, $listadoViajes);
      while ($posicionActual < 0) {
        echo "\nEl código ingresado no corresponde a ningún viaje registrado. Ingrese un código válido: ";
        $codigoViaje = esNumero();
      }
      echo "\nCódigo del viaje: " . $listadoViajes[$posicionActual]->getCodigo();
      echo "\nDestino del viaje: " . $listadoViajes[$posicionActual]->getDestino();
      echo "\nCantidad máxima de pasajeros en el viaje: " . $listadoViajes[$posicionActual]->getMaxPasajeros();
      echo "\nCantidad de pasajeros registrados en el viaje: " . count($listadoViajes[$posicionActual]->getListaPasajeros());
      echo "\n¿Desea ver el registro de todos los pasajeros registrados en el viaje? (S/N): ";
      $respuesta = trim(fgets(STDIN));
      $respuesta = strtolower($respuesta);
      if ($respuesta == "s") {
        print_r($listadoViajes[$posicionActual]->getListaPasajeros());
      }
      break;
  }
} while ($opcion != 4);
