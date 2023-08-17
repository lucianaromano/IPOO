<?php
include 'Lectura.php';
include 'Persona.php';
include 'Libro2.php';
$objPersona= new Persona ("Luciana","Romano","DNI",42604817);
$objLibro= new Libro (702,"De rosas y mil amores",2015,"Planeta",$objPersona,130,"Romance");

$lectura= new Lectura ($objLibro, 40);
echo "\n". $lectura ."\n";

$paginaSiguiente= $lectura-> siguientePagina();
echo "\n El número de página siguiente es: ".$paginaSiguiente;
$paginaAnterior= $lectura->retrocederPagina();
echo "\n El número de página anterior es: ".$paginaAnterior;




?>