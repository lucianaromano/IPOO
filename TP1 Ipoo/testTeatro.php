<?php
include 'Teatro.php';
//creo el arreglo asociativo de funciones
$funciones=[];
$funciones[0]=["Nombre"=>"La serenita","Precio"=>1500];
$funciones[1]=["Nombre"=>"La granja de Zenon","Precio"=>2500];
$funciones[2]=["Nombre"=>"Frozen","Precio"=>1200];
$funciones[3]=["Nombre"=>"Cars","Precio"=>3800];

//creo la clase Teatro
$teatro= new Teatro ("Para los niños","9 de Julio 360",$funciones);
echo $teatro;
//Modificar el nombre del teatro
echo "\n Ingrese el nuevo nombre del teatro: ";
$nuevoNombre=trim(fgets(STDIN));
$teatro->modificarNombre($nuevoNombre);
//Modificar la direccion del teatro
echo "\Ingrese la nueva direccion del teatro: ";
$direNueva=trim(fgets(STDIN));
$teatro->modificarDireccion($direNueva);
//Muestro los nuevos datos en pantalla
echo "\n DATOS NUEVOS:".$teatro;


//Modificar nombre y precio de funcion
echo "Ingrese el número de la funcion a modificar: ";
$numFuncion=trim(fgets(STDIN));
echo "\n Ingrese el nuevo nombre de la funcion: ";
$nuevoNombre=trim(fgets(STDIN));
echo "\n Ingrese el nuevo precio de la funcion: ";
$nuevoPrecio=trim(fgets(STDIN));
$modifico=$teatro->modificarFuncion($numFuncion,$nuevoNombre,$nuevoPrecio);
$resultado = ($modifico?"Se modificaron los datos exitosamente. ":"Los datos no se puedieron modificar. ");
echo $resultado;

?>