<?php
include "Cliente.php";
include "Concesionaria.php";
include "Vehiculo.php";
include "Venta.php";
/**
 * 1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
*2. Cree 3 objetos Vehículos con la información visualizada en la tabla: código, costo, año fabricación,
*descripción, porcentaje incremento anual, activo.
 */
$objCliente1 = new Cliente ("Luciana", "Romano","SI","DNI", 42604817);
$objCliente2 = new Cliente ("Nahuel","Ruiz", "NO","DNI",40443386);

function crearObjVehiculo(){
    
    $vehiculo1 = new Vehiculo(1678, 200000, 1997, "Toyota");
    $vehiculo2 = new Vehiculo(2001, 150000, 2005 , "Fiat");
    $vehiculo3 = new Vehiculo(1278, 10000, 2023, "Audi");
    
    $arregloObjVehiculo = array ($vehiculo1,$vehiculo2,$vehiculo3);
    
    $objEmpresa = new Empresa($arregloObjVagon);
    
    return $objEmpresa;
}
?>