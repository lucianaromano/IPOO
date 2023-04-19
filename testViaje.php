<?php
/**
 * Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y 
 * teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información 
 * de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, 
 * número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.
 * Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar 
 * la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el
 *  pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.
 */


 //incluyo todos las clases 
include "Viaje.php";
include "Pasajeros.php";
include "ResponsableV.php";

//objetos pasajeros
$pasajeros1 = new Pasajeros("Olivia","Ruiz",59118307,2994097006);
$pasajeros2 = new Pasajeros("Lorena","Romano",40183241,2994639156);
$pasajeros3 = new Pasajeros("Blanca","Beatriz",14275429,2996329400);
$pasajeros4 = new Pasajeros("Nahuel","Ruiz",40443386,2994056653);

//creo un objeto responsable del viaje
$respon = new ResponsableV(123,156,"pepe","aguello");

///////////DATOS PRE CARGADOS////////////////

//creo el arreglo indexado con los objetos persona
$pasajeros=[$pasajeros1,$pasajeros2,$pasajeros3,$pasajeros4];

$viaje1 = new Viaje(721,"Neuquen",80,$pasajeros,$respon);
echo $viaje1."\n\n";


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
    echo "(5) Salir \n";
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
            $viaje1->setCodigoViaje($nuevoCodigo);
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
        case 5: //salir 
            echo "Saliendo del programa... \n";
            sleep(3); //a los 3seg sale del programa.

        break;
        }
} while (($opcion>=1) && ($opcion<4))

?>