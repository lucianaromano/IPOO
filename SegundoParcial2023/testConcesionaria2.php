<?php

include ("Cliente.php");
include ("Concesionaria.php");
include ("Vehiculo.php");
include ("Venta.php");
include ("VehiculoNacional.php");
include ("VehiculoImportado.php");
/**
 * 1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
* 2. Cree 4 objetos Vehículos con la información visualizada en las siguientes tablas: código, costo, año fabricación,
* descripción, porcentaje incremento anual, activo.
 */
$objCliente1= new Cliente ("Luciana","Romano",true,"DNI",42604817);
$objCliente2= new Cliente ("Nahuel","Ruiz",false,"DNI",40443386);

$objVehiculo1=new VehiculoNacional(11,50000,2020,"Volkswagen Polo POLO TRENDLINE",85,true,10);
$objVehiculo2=new VehiculoNacional(12,10000,2021,"RAM 1500 Laramie",70,true,10);
$objVehiculo3=new VehiculoNacional(13,10000,2022,"Jeep Renegade 1.8 Sport",55,false,15);
$objVehiculo4=new VehiculoImportado(14,12499900,2020,"Ferrari",100,true,"Italia",6244400);

$concesionaria= new Concesionaria("Alta gama", "Av argentina 123", [$objCliente1, $objCliente2],[$objVehiculo1, $objVehiculo2, $objVehiculo3, $objVehiculo4],[]);

echo "\n-------------Punto 4-----------------\n";
$colCodigosVehiculo=[11,12,13,14];
$concesionaria->registrarVenta($colCodigosVehiculo,$objCliente2);
echo "\n-------------Punto 5-----------------\n";
$colCodigosVehiculo=[0,14];
echo $concesionaria->registrarVenta($colCodigosVehiculo,$objCliente2);
echo "\n-------------Punto 6-----------------\n";
$colCodigosVehiculo=[2,14]; 
echo $concesionaria->registrarVenta($colCodigosVehiculo,$objCliente2);
echo "\n-------------Punto 7-----------------\n";
echo $concesionaria->informarVentasImportadas();
echo "\n-------------Punto 8-----------------\n";
echo $concesionaria->informarSumaVentasNacionales();
echo "\n-------------Punto 9-----------------\n";
echo $concesionaria;
?>