<?php
//EJERCICIO 16 - TP 1 "IPOO"
/**Cree una clase Libro que tenga los atributos ISBN, titulo, año de edición, editorial, nombre y apellido
del autor. Defina en la clase los siguientes métodos
a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos de la
clase.
b) Los método de acceso de cada uno de los atributos de la clase.
c) Método toString() que retorne la información de los atributos de la clase.
d) perteneceEditorial($peditorial): indica si el libro pertenece a una editorial dada. Recibe como parámetro
una editorial y devuelve un valor verdadero/falso.
e) aniosdesdeEdicion(): método que retorna los años que han pasado desde que el libro fue editado.
f) Cree un script TestLibro que:
1) defina el método iguales($plibro,$parreglo): dada una colección de libros, indica si el libro pasado por
parámetro ya se encuentra en dicha colección.
2) defina el método librodeEditoriales($arreglolibros, $peditorial): método que retorna un arreglo asociativo
con todos los libros publicados por la editorial dada.
3) cree al menos tres objetos libros e invoque a cada uno de los métodos implementados en la clase Libro.  */
class Libro{
    private $ISBN;
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $nombreYApellidoAutor;
    
    //metodo constructor de la clase
    public function __construct($ISBN, $titulo, $anioEdicion,$editorial,$nombreYApellidoAutor){
        $this->ISBN=$ISBN;
        $this->titulo=$titulo;
        $this->anioEdicion=$anioEdicion;
        $this->editorial=$editorial;
        $this->nombreYApellidoAutor=$nombreYApellidoAutor;
    }

    //metodos de acceso
    public function getISBN(){
        return $this->ISBN;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getAnioEdicion(){
        return $this->anioEdicion;
    }
    public function getEditorial(){
        return $this->editorial;
    }
    public function getNombreYApellidoAutor(){
        return $this->nombreYApellidoAutor;
    }
    public function setISBN($ISBN){
        $this->ISBN=$ISBN;
    }
    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }
    public function setAnioEdicion($anioEdicion){
        $this->anioEdicion=$anioEdicion;
    }
    public function setEditorial($editorial){
        $this->editorial=$editorial;
    }
    public function setNombreYApellidoAutor($nombreYApellidoAutor){
        $this->nombreYApellidoAutor=$nombreYApellidoAutor;
    }
    //otros metodos

    public function __toString(){
        return "\n ISBN del Libro: ". $this->getISBN().
                "\n Titulo del libro: ".$this->getTitulo().
                "\n Año de edicion: ".$this->getAnioEdicion().
                "\n Editoral del libro: ".$this->getEditorial().
                "\n Nombre y apellido del autor: ".$this->getNombreYApellidoAutor();
    }

    /**
     * perteneceEditorial($peditorial): indica si el libro pertenece a una editorial dada. Recibe como parámetro una editorial y devuelve un valor verdadero/falso. 
    *@param string $editorial
    *@return boolean $respuesta
    */
    public function perteneceEditorial($editorial){
        if($editorial== ($this->getEditorial())){
            $respuesta =true;
        }else {
            $respuesta= false;
        }
        return $respuesta;
    }

    /**
    *aniosdesdeEdicion(): método que retorna los años que han pasado desde que el libro fue editado.
    *@return int $cantAnios
    */
    public function aniosDesdeEdicion(){
        $anioEdicion= $this->getAnioEdicion();
        $anioActual= 2023;
        $cantAnios= $anioActual - $anioEdicion;
        return $cantAnios;
    }

}

?>