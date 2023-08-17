<?php

include ("Cliente.php");
include ("Concesionaria.php");
include ("Vehiculo.php");
include ("Venta.php");
include ("VehiculoNacional.php");
include ("VehiculoImportado.php");
include ("VentaLocal.php");
include ("VentaOnline.php");

$objCliente1= new Cliente ("Luciana","Romano",true,"DNI",42604817);
$objCliente2= new Cliente ("Nahuel","Ruiz",false,"DNI",40443386);

$objVehiculo1=new VehiculoNacional(11,50000,2020,"Volkswagen Polo POLO TRENDLINE",85,true,10);
$objVehiculo2=new VehiculoNacional(12,10000,2021,"RAM 1500 Laramie",70,true,10);
$objVehiculo3=new VehiculoNacional(13,10000,2022,"Jeep Renegade 1.8 Sport",55,false,15);
$objVehiculo4=new VehiculoImportado(14,12499900,2020,"Ferrari",100,true,"Italia",6244400);

$concesionaria= new Concesionaria("Alta gama", "Av argentina 123", [$objCliente1, $objCliente2],[$objVehiculo1, $objVehiculo2, $objVehiculo3, $objVehiculo4],[]);
$info=["formaPago"=> "efectivo","direccion"=>"Patquia 1969","dniReceptor"=>12275492,"telefono"=>2994056653,"transporte"=>1000,"diaEntrega"=>"27/05/2023","horarioEntrega"=>16.00];
echo "\n-------------Punto 4-----------------\n";
$colCodigosVehiculo=[11,12,13,14];
$datos= $concesionaria->registrarVenta($colCodigosVehiculo,$objCliente2,"online",$info);
echo"El total de las ventas de los vehiculos 11,12,13 y 14 es: ".$datos;
echo "\n-------------Punto 5-----------------\n";
$colCodigosVehiculo=[14];
print_r ($concesionaria->registrarVenta($colCodigosVehiculo,$objCliente2,"local",$info));
echo "\n-------------Punto 6-----------------\n";
$colCodigosVehiculo=[2,14]; 
echo $concesionaria->registrarVenta($colCodigosVehiculo,$objCliente2,"local",$info);
echo "\n-------------Punto 7-----------------\n";
//echo $concesionaria->retornarVentasOnline();
echo "\n-------------Punto 8-----------------\n";
echo $concesionaria->retornarImporteVentasEnLocal()();
echo "\n-------------Punto 9-----------------\n";
echo $concesionaria;
?>