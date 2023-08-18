<?php
include_once 'BaseDatos.php';

class Modulo {
    private $id_modulo;
    private $descripcion;
    private $tope;
    private $costo;
    private $hora_inicio;
    private $hora_cierre;
	private $fecha;
    private $obj_actividad;
    private $col_inscripciones;
	private $mensajeoperacion;


    public function __construct(){
        $this-> id_modulo = 0 ;
        $this-> descripcion = "";
        $this-> tope = "";
        $this-> costo = "";
        $this-> hora_inicio ="";
		$this-> hora_cierre="";
		$this-> fecha ="";
        $this->obj_actividad= null ;
        $this->col_inscripciones=[];
    }

    public function cargar($id_modulo,$descripcion,$tope,$costo,$hora_inicio,$hora_cierre,$fecha,$id_actividad){		
		$this->setIdModulo($id_modulo);
		$this->setDescripcion($descripcion);
		$this->setTope($tope);
		$this->setCosto($costo);
		$this->setHoraInicio($hora_inicio);
		$this->setHoraCierre($hora_cierre);
		$this->setFecha($fecha);
        $this->setObjActividad($id_actividad);

    }
	
    public function getIdModulo(){
        return $this->id_modulo;
    }
    
    public function setIdModulo($id_modulo){
        $this->id_modulo = $id_modulo;
    }
    
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    
    public function getTope(){
        return $this->tope;
    }
    public function setTope($tope){
        $this->tope = $tope;
    }
	public function getCosto(){
        return $this->costo;
    }
    
    public function setCosto($costo){
        $this->costo = $costo;
    }
    
    public function getHoraInicio(){
        return $this->hora_inicio;
    }
    public function setHoraInicio($hora_inicio){
        $this-> hora_inicio = $hora_inicio;
    }
    public function getHoraCierre(){
        return $this->hora_cierre;
    }
	public function setHoraCierre($hora_cierre){
        $this->hora_cierre = $hora_cierre;
    }
    
    public function getFecha(){
        return $this->fecha;
    }
	public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function getObjActividad(){
        return $this->obj_actividad;
    }
    
	public function setObjActividad($id_actividad){
        $this->obj_actividad = $id_actividad;
    }
    public function getColInscripciones(){
        return $this->col_inscripciones;
    }
    
	public function setColInscripciones($col_inscripciones){
        $this->col_inscripciones = $col_inscripciones;
    }
    public function getMensajeOperacion(){
		return $this->mensajeoperacion;
	}
	public function setMensajeOperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

    /**
	 * Recupera los datos de un modulo por su id
	 * @param int $id
	 * @return boolean
	 */		
    public function Buscar($id){
		$base = new BaseDatos();
		$consultaBusqueda = "SELECT * from modulo where id_modulo=".$id;
		$resp = false;

		if($base->Iniciar()){
			if($base->Ejecutar($consultaBusqueda)){
				if($row2=$base->Registro()){		
				    $this->setIdModulo($id);
					$this->setDescripcion($row2['descripcion']);
					$this->setTope($row2['tope']);
					$this->setCosto($row2['costo']);
					$this->setHoraInicio($row2['hora_inicio']);
					$this->setHoraCierre($row2['hora_cierre']);
					$this->setFecha($row2['fecha']);
                    $this->setObjActividad($row2['obj_actividad']);
					$resp= true;
				}				
		 	}	else {
		 			$this->setMensajeOperacion($base->getError());
			}
		 }	else {
		 		$this->setMensajeOperacion($base->getError());
		 }		
		 return $resp;
	}	
    
	/** Coloca la clase en una tabla de la base de datos
     * @param ()
     * @return boolean 
    */
	public function insertar(){
		$base=new BaseDatos();
		$resp= false;
		$consultaInsertar="INSERT INTO modulo(id_modulo,descripcion,tope,costo,hora_inicio,hora_cierre,fecha,id_actividad)
				VALUES ('".$this->getIdModulo()."','".$this->getDescripcion()."','".$this->getTope()."','".$this->getCosto()."','".$this->getHoraInicio()."','".$this->getHoraCierre()."','".$this->getFecha()."','".$this->getObjActividad()."')";
		
		if($base->Iniciar()){
			if($base->Ejecutar($consultaInsertar)){
			    $resp=  true;
			}	else {
					$this->setMensajeOperacion($base->getError());			
			}
		} else {
				$this->setMensajeOperacion($base->getError());	
		}
		return $resp;
	}

	/** Actualiza los datos de la tabla modulo en la base de datos que coincida con su  id
     * @param ()
     * @return boolean 
    */
    public function modificar(){
	    $resp = false; 
	    $base = new BaseDatos();
		$consultaModifica="UPDATE modulo SET descripcion='".$this->getDescripcion()."',tope='".$this->getTope()."',costo= '" .$this->getCosto(). 
		"',hora_inicio= '".$this->getHoraInicio()."',hora_cierre= '".$this->getHoraCierre(). "',fecha= '".$this->getFecha(). "'WHERE id_modulo=". $this->getIdModulo();

		if($base->Iniciar()){
			if($base->Ejecutar($consultaModifica)){
			    $resp=  true;
			}else{
				$this->setMensajeOperacion($base->getError());
			}
		}else{
				$this->setMensajeOperacion($base->getError());
		}
		return $resp;
	}	
	
	/** Elimina una instancia de la tabla modulos 
     * @param ()
     * @return boolean
     */
	public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->Iniciar()){
				$consultaBorra="DELETE FROM modulo WHERE id_modulo=".$this->getIdModulo();
				if($base->Ejecutar($consultaBorra)){
				    $resp=  true;
				}else{
						$this->setMensajeOperacion($base->getError());		
				}
		}else{
				$this->setMensajeOperacion($base->getError());
		}
		return $resp; 
	}

	/**
     * Lista todos los modulos que cumplen con una condicion dada
     * @param String $condicion
     * @return Array $arregloModulo
     */
    public function listar($condicion)
    {
        $arregloModulo = [];
        $base = new BaseDatos();
        $consulta = "SELECT * FROM modulo ";
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE ' . $condicion;
        }
        $consulta .= " ORDER BY id_modulo ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $arregloModulo = array();
                while ($row2 = $base->Registro()) {

					$id_modulo= $row2['id_modulo'];
                    $obj = new Modulo();
                    $obj->Buscar($id_modulo);
                    array_push($arregloModulo, $obj);
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $arregloModulo;
    }
	
	//metodo toString de la clase modulos
	public function __toString(){
		return          "\n\t MODULOS: ".
                        "ID: " . $this->getIdModulo(). "\n".
					 	"Descripcion: " . $this->getDescripcion()."\n".
					 	"Tope de inscripcion: " . $this->getTope()."\n".
						"Costo: ". $this->getCosto()."\n".
						"Hora inicio: ". $this->getHoraInicio()."\n".
						"Hora cierre: ". $this->getHoraCierre().
						"Fecha: ". $this->getFecha().
                        "Actividad: ".$this->getObjActividad().
                        "Inscripciones: " .$this->inscripcionesAString();
	}

    public function inscripcionesAString(){
		$retorno = "";
		$arreglo = $this->getColInscripciones();
		foreach ($arreglo as $i){
			$retorno .= $i . "\n";
			$retorno .= "--------------------------------------\n";
		}
		return $retorno;
	}

	public function darCostoModulo(){
        $colModulos = [] ;
        $costoTotal = 0;
        $costoEnLinea = 0;
        $costoPresencial =0;
        foreach ($colModulos as $objModulo) {
            $costoModulo = $objModulo->darCostosModulo();
            switch (get_class($objModulo)) {
                case "En Linea":
                    $costoEnLinea += $costoModulo;
                    break;
                case "Presencial":
                    $costoPresencial += $costoModulo;
                    break;
            }
        }
        $costoTotal = $costoEnLinea + $costoPresencial;
        return "\n Costo total: $" . $costoTotal;
    }
    /*    function modificarModulo ($objModulo, $opcionModificar, $dato){
        if ($opcionModificar==1){
            $objModulo -> setDescripcion($dato);
        }
        elseif ($opcionModificar==2){
            $objModulo -> setTope($dato);
        }
        elseif ($opcionModificar==3){
            $objModulo -> setCosto($dato);
        }
        
        elseif ($opcionModificar==4){
            $objModulo -> setHoraInicio($dato);
        }
        
        elseif ($opcionModificar==5){
            $objModulo -> setHoraCierre($dato);
        }
        
        elseif ($opcionModificar==6){
            $objModulo -> setFecha($dato);
        }
        $respuesta = $objModulo -> modificar();
        if ($respuesta==true) {
            echo " \nLos datos fueron actualizados correctamente\n";
        }else {
            echo $objModulo->getMensajeOperacion();
        } 
    }*/
	
}













?>