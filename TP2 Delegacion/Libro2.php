<?php

/**Realizar las modificaciones necesarias en la clase Libro (Ejercicio 16 del TP1) para que en vez de contener
como atributos nombre y apellido del autor del libro, tenga una referencia a las clase Persona. Además
agregue como variables instancias de la clase la cantidad de páginas y sinopsis del libro.
a) Método constructor _ _construct () que recibe como parámetros los valores iniciales para los atributos
de la clase.
b) Los métodos de acceso de cada uno de los atributos de la clase.
c) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase
d) Crear un script Test_Libro que cree un objeto Libro e invoque a cada uno de los métodos
implementados. */
class Libro{
    private $ISBN;
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $autor;
    //nuevos atributos
    private $cantPaginas;
    private $sinopsisLibro;
    
    //metodo constructor de la clase
    public function __construct($ISBN, $titulo, $anioEdicion,$editorial,$objPersona,$cantPaginas,$sinopsisLibro){
        $this->ISBN=$ISBN;
        $this->titulo=$titulo;
        $this->anioEdicion=$anioEdicion;
        $this->editorial=$editorial;
        $this->autor=$objPersona;
        $this->cantPaginas=$cantPaginas;
        $this->sinopsisLibro=$sinopsisLibro;
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
    public function getAutor(){
        return $this->autor;
    }
    public function getCantPaginas(){
        return $this->cantPaginas;
    }
    public function getSinopsisLibro(){
        return $this->sinopsisLibro;
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
    public function setAutor($objPersona){
        $this->autor=$objPersona;
    }
    public function setCantPaginas($cantPaginas){
        $this->autor=$cantPaginas;
    }
    public function setSinopsisLibro($sinopsisLibro){
        $this->sinopsisLibro=$sinopsisLibro;
    }
    //otros metodos

    public function __toString(){
        return "\n ISBN: ". $this->getISBN().
                "\n Titulo: ".$this->getTitulo().
                "\n Año de edicion: ".$this->getAnioEdicion().
                "\n Editoral: ".$this->getEditorial().
                "\n DATOS DEL AUTOR: ".$this->getAutor();
                "\n Cantidad de páginas: ".$this->getCantPaginas();
                "\n Sinopsis del libro: ".$this->getSinopsisLibro();
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