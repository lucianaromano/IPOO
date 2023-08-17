<?php
/**Se desea implementar una clase Lectura que almacena información sobre la lectura de un determinado libro.
Esta clase tiene como variable instancia un referencia a un objeto Libro y el número de la página que se esta
leyendo. Por otro lado la clase contiene los siguientes métodos:
a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos
de la clase.
b) Los métodos de acceso de cada uno de los atributos de la clase.
c) siguientePagina(): método que retorna la página del libro y actualiza la variable que contiene la
pagina actual.
d) retrocederPagina(): método que retorna la página anterior a la actual del libro y actualiza su valor.
e) irPagina(x): método que retorna la página actual y setea como página actual al valor recibido por
parámetro.
f) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
g) Crear un script Test_Lectura que cree un objeto Lectura e invoque a cada uno de los métodos
implementados */
class Lectura{
    private $refLibro;
    private $nroPagina;

    //metodo constructor de la clase
    public function __construct($objLibro, $nroPagina){
        $this->refLibro=$objLibro;
        $this->nroPagina=$nroPagina;
    }
    //metodos de acceso
    public function getRefLibro(){
        return $this->refLibro;
    }
    public function getNroPagina(){
        return $this->nroPagina;
    }
    public function setRefLibro($objLibro){
        $this->refLibro=$objLibro;
    }
    public function setNroPagina($nroPagina){
        $this->nroPagina=$nroPagina;
    }

    //otros metodos

    /**siguientePagina(): método que retorna la página siguiente del libro y actualiza la variable que contiene la pagina actual. */
    public function siguientePagina(){
        $nroPagina= $this->getNroPagina();
        $nroPaginaSiguiente= $nroPagina + 1 ;
        $this->setNroPagina($nroPaginaSiguiente);
        return $nroPaginaSiguiente;
    }
    /**retrocederPagina(): método que retorna la página anterior a la actual del libro y actualiza su valor. */
    public function retrocederPagina(){
        $nroPagina2= $this->getNroPagina();
        $nroPaginaAnterior= $nroPagina2 - 1 ;
        $this->setNroPagina($nroPaginaAnterior);
        return $nroPaginaAnterior;
    }
    public function __toString(){
        return  "\n DATOS DEL LIBRO: ".$this->getRefLibro().
                "\n Lectura de la página n°: ".$this->getNroPagina();
    }
}


?>