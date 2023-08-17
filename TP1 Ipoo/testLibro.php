<?php
include 'Libro.php';

/**1) defina el método iguales($plibro,$parreglo): dada una colección de libros, indica si el libro pasado por
parámetro ya se encuentra en dicha colección.
2) defina el método librodeEditoriales($arreglolibros, $peditorial): método que retorna un arreglo asociativo
con todos los libros publicados por la editorial dada.
3) cree al menos tres objetos libros e invoque a cada uno de los métodos implementados en la clase Libro.  */

$libro= new Libro (978,"¿Alex, quizas?",2017,"Planeta","Jenn Bennett");
//$objLibro2= new Libro (1020, "Anna Frank", 2000, "Alen", "Pablo Perez");
//$objLibro3= new Libro (732,"De amores y mil poemas",2015,"Planeta","Candela Sanchez");

//$arregloLibros= [$objLibro1,$objLibro2,$objLibro3];
//print_r  ($arregloLibros);
$respuesta= $libro->perteneceEditorial("V&R");
if ($respuesta == true){
    echo"\n El libro pertenece a la editorial.";
}else {
    echo "\n El libro no pertenece a la editorial.";
}

$aniosPasados=$libro->aniosDesdeEdicion();
echo "\n Los años que han pasado desde la edicion de este libro son: " .$aniosPasados;
?>