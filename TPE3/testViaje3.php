<?php

 //incluyo todos las clases 
include "Viaje.php";
include "Pasajeros3.php";
include "ResponsableV.php";
include "PasajerosVip.php";
include "PasajerosNecesidades.php";

//objetos pasajeros
$pasajeros1 = new Pasajeros("Olivia","Ruiz",59118307,2994097006, 12, 650);
$pasajeros2 = new Pasajeros("Lorena","Romano",40183241,2994639156, 23, 001);
$pasajeros3 = new Pasajeros("Blanca","Beatriz",14275429,2996329400, 27, 123);
$pasajeros4 = new Pasajeros("Nahuel","Ruiz",40443386,2994056653, 8, 120);

//creo un objeto responsable del viaje
$respon = new ResponsableV(123,156,"pepe","aguello");

///////////DATOS PRE CARGADOS////////////////

//creo el arreglo indexado con los objetos persona
$pasajeros=[$pasajeros1,$pasajeros2,$pasajeros3,$pasajeros4];

$viaje1 = new Viaje(721,"Neuquen",80,$pasajeros,$respon);
//Inicializo las clases hijas
$pasajeroVip = new PasajerosVip("Nahuel","Ruiz",40443386,2994056653,8, 120, 005,3200);
$pasajerosNecesidades= new PasajerosNecesidades("Blanca","Beatriz",14275429,2996329400, 27, 123, "NO", "NO", "SI");


/**
 * Solicita al usuario una opcion del menu, vuelve a solicitar en caso de ser invalida.
 * @return int $opcion
 */
function menuOpciones(){
    echo "Ingrese la opcion deseada: \n";
    echo "(1) Información del viaje \n";
    echo "(2) Modificar informacion de un viaje \n";
    echo "(3) Datos de un pasajero \n";
    echo "(4) Modificar datos responsable de viaje \n";
    echo "(5) Vender pasaje";
    echo "(6) Salir \n";
    $opcion=trim(fgets(STDIN));

    if (!($opcion == 1 || $opcion == 2 || $opcion == 3 || $opcion == 4 || $opcion == 5) ){
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
            $viaje1->setCodigoViaje($nuevoCodigo);
            echo "Ingrese un nuevo destino de viaje: "; //modifico el destino del viaje
            $nuevoDestino=trim(fgets(STDIN));
            $viaje1->setDestino($nuevoDestino);
            echo "Ingrese nueva cantidad máxima de pasajeros del viaje: "; //modifico cantidad max de pasajeros
            $nuevaCantMax=trim(fgets(STDIN));
            $viaje1->setCantidadMaximaPasajeros($nuevaCantMax);
            echo "Ingrese nuevo costo del viaje: ";
            $nuevoCosto=trim(fgets(STDIN));
            $viaje1->setCosto($nuevoCosto);
            echo "\n Datos modificados del viaje: \n" .$viaje1."\n";

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
        case 4:
            echo "Los anteriores datos del responbale son: \n";
            echo $viaje1->getObjResponsableV()."\n\n";
            echo "Ingrese nuevo numero de empleado: \n";
            $newNroEmpleado= trim(fgets(STDIN));
            echo "Ingrese nuevo numero de Licencia: \n";
            $newNroLicEmpleado= trim(fgets(STDIN));
            echo "Ingrese nuevo nombre del empleado: \n";
            $newNomEmpleado= trim(fgets(STDIN));
            echo "Ingrese nuevo apellido del empleado: \n\n";
            $newApellEmpleado= trim(fgets(STDIN));
            $newEmpleado= $viaje1->ModificarDatosResponsable($newNroEmpleado,$newNroLicEmpleado,$newNomEmpleado,$newApellEmpleado);
            echo "Los nuevos datos del responbale son: \n";
            echo $viaje1->getObjResponsableV();
        case 5:
            //creo el nuevo pasajero
            echo "Ingrese el nombre del pasajero: \n";
            $nombre=trim(fgets(STDIN));
            echo "Ingrese el apellido del pasajero: \n";
            $apellido=trim(fgets(STDIN));
            echo "Ingrese el documento del pasajero: \n";
            $doc=trim(fgets(STDIN));
            echo "Ingrese el telefono del pasajero: \n";
            $telefono=trim(fgets(STDIN));
            echo "Ingrese el numero de asiento: \n";
            $numAsiento=trim(fgets(STDIN));
            echo "Ingrese el numero de ticket: \n";
            $numTicket=trim(fgets(STDIN));
            $pasajero= new Pasajeros ($nombre,$apellido,$doc,$telefono,$numAsiento,$numTicket);

            //pido tipo de pasajero
            echo "Que tipo de pasajero es?(VIP/Especial): \n";
            $tipo=trim(fgets(STDIN));

            if($tipo=="VIP"){
                echo "Numero de viajero frecuente: ";
                $nroViajero=trim(fgets(STDIN));
                $PasajeroVip->setNroViajeroFrecuente($nroViajero);
                echo "Cantidad de millas: ";
                $millas=trim(fgets(STDIN));
                $PasajeroVip->setCantMillas($millas);
                $costo=($Pasajeros3->setVenderPasaje($pasajero)) * ($PasajeroVip->setDarPorcentajeIncremento());
            }elseif($tipo == "Especial"){
                echo "Necesita silla de ruedas? (SI/NO): ";
                $rtaSilla=trim(fgets(STDIN));
                $PasajeroNecesidad->setSillaDeRuedas($rtaSilla);
                echo "Necesita asistencia para el embarque o desembarque?(SI/NO): ";
                $asistencia=trim(fgets(STDIN));
                $PasajeroNecesidad->setAsistencia($asistencia);
                echo "Necesita comida especial?(SI/NO): ";
                $comida=trim(fgets(STDIN));
                $PasajeroNecesidad->setComidaEspecial($comida);
                $costo=($Pasajeros3->setVenderPasaje($pasajero)) * ($PasajeroNecesidad->setDarPorcentajeIncremento());
                echo "Se realizo la venta. El costo es: " .$costo. "\n";
            }
        case 6: //salir 
            echo "Saliendo del programa... \n";
            sleep(3); //a los 3seg sale del programa.

        break;
        }
} while (($opcion>=1) && ($opcion<4))

?>