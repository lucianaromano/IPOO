<?php
include "Cliente.php";
include "Concesionaria.php";
include "Vehiculo.php";
include "Venta.php";
//1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
$objCliente1= new Cliente ("Luciana","Romano","SI","DNI",42604817);
$objCliente2= new Cliente ("Nahuel","Ruiz","NO","DNI",40443386);
//2.Cree 3 objetos Vehículos con la  información visualizada en la tabla: código, 
//costo, año fabricación, descripción, porcentaje incremento anual, activo.
$objVehiculo1=new Vehiculo(11,50000,2020,"Volkswagen Polo POLO TRENDLINE",85,true);
$objVehiculo2=new Vehiculo(12,10000,2021,"RAM 1500 Laramie",70,true);
$objVehiculo3=new Vehiculo(13,10000,2022,"Jeep Renegade 1.8 Sport",55,false);
/**4. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”, 
 *  colección de vehículos = [$obVehiculo1, $obVehiculo2, $obVehiculo3] , colección de clientes = [$objCliente1, $objCliente2 ],
 *  la colección de ventas realizadas=[].
 */

$colVehiculos=[$objVehiculo1, $objVehiculo2, $objVehiculo3];
$colClientes=[$objCliente1, $objCliente2];
$concesionaria= new Concesionaria("Alta gama", "Av argentina 123",$colVehiculos, $colClientes,[]);

/**5.Invocar al método  registrarVenta($colCodigosVehiculo, $objCliente) de la Clase Empresa donde el $objCliente es una 
 * referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos 
 * de vehículos es la siguiente [11,12,13]. Visualizar el resultado obtenido. */
echo "-------------Punto 5-----------------\n";
$colCodigosVehiculo=[11,12,13];
$concesionaria->registrarVenta($colCodigosVehiculo,$objCliente2);

/**6. Invocar al método  registrarVenta($colCodigosVehículos, $objCliente) de la Clase Empresa donde el $objCliente es una
 *  referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos 
 * de vehículos es la siguiente [0].  Visualizar el resultado obtenido.
 */
echo "-------------Punto 6-----------------\n";
$colCodigosVehiculo=[0];
$concesionaria->registrarVenta($colCodigosVehiculo,$objCliente2);

/**7. Invocar al método  registrarVenta($colCodigosVehículos, $objCliente) de la Clase Empresa donde el $objCliente es una 
 * referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos 
 * de vehículos es la siguiente [2].  Visualizar el resultado obtenido.
 */
echo "-------------Punto 7-----------------\n";
$colCodigosVehiculo=[2];
$concesionaria->registrarVenta($colCodigosVehiculo,$objCliente2);

/**8. Invocar al método retornarVentasXCliente($tipo,$numDoc)  donde el tipo y número de documento se corresponden con el 
 * tipo y número de documento del $objCliente1.
 */
echo "-------------Punto 8-----------------\n";
$tipo= $objCliente1->getTipoDoc();
$numDoc= $objCliente1->getNroDoc();
$concesionaria->retornarVentasXCliente($tipo,$numDoc);
/**9. Invocar al método retornarVentasXCliente($tipo,$numDoc)  donde el tipo y número de documento se corresponden con el 
 * tipo y número de documento del $objCliente2.
 */
echo "-------------Punto 9-----------------\n";
$tipo= $objCliente2->getTipoDoc();
$numDoc= $objCliente2->getNroDoc();
$concesionaria->retornarVentasXCliente($tipo,$numDoc);

/**Realizar un echo de la variable Empresa creada en 2.*/
echo "-------------Punto 10-----------------\n";
echo $concesionaria;
?>