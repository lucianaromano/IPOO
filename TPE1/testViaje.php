<?php

include "viaje.php";
//creo el arreglo
$pasajero1=["nombre"=> "Nahuel", "apellido"=>"Ruiz", "documento"=>40433386];
$pasajero2=["nombre"=> "Blanca", "apellido"=>"Lopez", "documento"=>12295066];
$pasajeros =[$pasajero1, $pasajero2];


//Incializo la clase viaje

$viaje1 = new viaje (721,"Neuquen",80,$pasajeros);
echo $viaje1."\n";

/**
 * Solicita al usuario una opcion del menu, vuelve a solicitar en caso de ser invalida.
 * @return int $opcion
 */
function menuOpciones(){
    echo "Ingrese la opcion deseada: \n";
    echo "(1) Información del viaje \n";
    echo "(2) Modificar informacion de un viaje \n";
    echo "(3) Datos de un pasajero \n";
    echo "(4) Salir \n";
    $opcion=trim(fgets(STDIN));

    if (!($opcion == 1 || $opcion == 2 || $opcion == 3 || $opcion == 4)){
        echo "Error. Ingrese una opción válida: \n";
    }
    return $opcion;
}

do {
    $opcion = (menuOpciones());
    switch($opcion)
        {
        case 1: //informacion del viaje
            echo "Los datos del viaje son: \n";
            echo $viaje1."\n";

        case 2: //modificar informacion de un viaje
            echo $viaje1."\n";
            echo "Ingrese un nuevo código de viaje: "; //modifico codigo del viaje
            $nuevoCodigo=trim(fgets(STDIN));
            $viaje1->setCodigo($nuevoCodigo);
            echo "Ingrese un nuevo destino de viaje: "; //modifico el destino del viaje
            $nuevoDestino=trim(fgets(STDIN));
            $viaje1->setDestino($nuevoDestino);
            echo "Ingrese nueva cantidad máxima de pasajeros del viaje: "; //modifico cantidad max de pasajeros
            $nuevaCantMax=trim(fgets(STDIN));
            $viaje1->setCantidadMaximaPasajeros($nuevaCantMax);
            echo $viaje1."\n";

        case 3: //datos del pasajero
            $cadena = $viaje1->mostrarDatosPasajeros(); //muestro datos precargados de pasajeros
            echo $cadena."\n";
            echo "Ingrese el número del pasajero a modificar: ";//modifico datos de un pasajero
            $num=trim(fgets(STDIN));
            echo "Ingrese el documento del pasajero a modificar: ";
            $dniAnterior=trim(fgets(STDIN));
            echo "Ingrese el nombre nuevo del pasajero: ";
            $nombreNuevo=trim(fgets(STDIN));
            echo "Ingrese el apellido nuevo del pasajero: ";
            $apellidoNuevo=trim(fgets(STDIN));
            echo "Ingrese el documento nuevo del pasajero: ";
            $dniNuevo=trim(fgets(STDIN));
            $viaje1->modificarDatos($num,$dniAnterior,$nombreNuevo,$apellidoNuevo,$dniNuevo);
            $cadena=$viaje1-> mostrarDatosPasajeros();
            echo $cadena ."\n";

        case 4: //salir 
            echo "Saliendo del programa... \n";
            sleep(3); //a los 3seg sale del programa.

        break;
        }
} while (($opcion>=1) && ($opcion<4))

?>