<?php
include 'Disquera.php';
include 'Persona.php';

$objPersona = new Persona("Luciana","Romano","DNI", 42604817);
$disquera= new Disquera(16.00, 20.00, "Cerrado","Av argentina 123", $objPersona);

echo "******************DATOS DISQUERA***************** \n".$disquera;

$horario= $disquera->dentroHorarioAtencion(20.00,00.30);
//echo "\n La tienda se encuentra abierta dentro de el horario: ".$horario;
$abierto= $disquera->abrirDisquera(17,00.30);
echo "\n El estado de la tienda en este horario es: ".$abierto;
$cerrado= $disquera->cerrarDisquera(18,00.00);
echo "\n El estado de la tienda en este horario es: ". $cerrado;
?>
