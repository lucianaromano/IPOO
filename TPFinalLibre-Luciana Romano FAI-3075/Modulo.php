<?php
include_once 'BaseDatos.php';

class Modulo {
    private $idModulo;
    private $descripcion;
    private $tope;
    private $costo;
    private $horaInicio;
    private $horaCierre;
	private $fecha;
	private $mensajeoperacion;


    public function __construct(){
        $this-> idModulo = "";
        $this-> descripcion = "";
        $this-> tope = "";
        $this-> costo = "";
        $this-> horaInicio ="";
		$this-> horaCierre="";
		$this-> fecha ="";
    }
	
    public function getIdModulo(){
        return $this->idModulo;
    }
    
    public function setIdModulo($idModulo){
        $this->idModulo = $idModulo;
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
        return $this->horaInicio;
    }
    public function setHoraInicio($horaInicio){
        $this-> horaInicio = $horaInicio;
    }
    public function getHoraCierre(){
        return $this->horaCierre;
    }
	public function setHoraCierre($horaCierre){
        $this->horaCierre = $horaCierre;
    }
    
	public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    
    public function getFecha(){
        return $this->fecha;
    }
    public function getMensajeOperacion(){
		return $this->mensajeoperacion;
	}
	public function setMensajeOperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

    //FUNCIONES DE LA CLASE MODULO

	public function cargar($idModulo,$descripcion,$tope,$costo,$horaInicio,$horaCierre,$fecha){		
		$this->setIdModulo($idModulo);
		$this->setDescripcion($descripcion);
		$this->setTope($tope);
		$this->setCosto($costo);
		$this->setHoraInicio($horaInicio);
		$this->setHoraCierre($horaCierre);
		$this->setFecha($fecha);
    }

    /**
	 * Recupera los datos de un modulo por su id
	 * @param int $id
	 * @return boolean
	 */		
    public function Buscar($id){
		$base = new BaseDatos();
		$consultaBusqueda = "SELECT * from modulo where idModulo=".$id;
		$resp = false;

		if($base->Iniciar()){
			if($base->Ejecutar($consultaBusqueda)){
				if($row2=$base->Registro()){		
				    $this->setIdModulo($id);
					$this->setDescripcion($row2['descripcion']);
					$this->setTope($row2['tope']);
					$this->setCosto($row2['costo']);
					$this->setHoraInicio($row2['horaInicio']);
					$this->setHoraCierre($row2['horaCierre']);
					$this->setFecha($row2['fecha']);
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
		$consultaInsertar="INSERT INTO modulo(idModulo,descripcion,tope,costo,horaInicio,horaCierre,fecha)
				VALUES ('".$this->getIdModulo()."','".$this->getDescripcion()."','".$this->getTope()."','".$this->getCosto()."','".$this->getHoraInicio()."','".$this->getHoraCierre()."','".$this->getFecha()."')";
		
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
		"',horaInicio= '".$this->getHoraInicio()."',horaCierre= '".$this->getHoraCierre(). "',fecha= '".$this->getFecha(). "'WHERE Id=". $this->getIdModulo();

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
				$consultaBorra="DELETE FROM modulo WHERE idModulo=".$this->getIdModulo();
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
        $consulta .= " ORDER BY id ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $arregloModulo = array();
                while ($row2 = $base->Registro()) {

					$idModulo= $row2['idModulo'];
                    $obj = new Modulo();
                    $obj->Buscar($idModulo);
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
		$cadena ="\n MODULOS \n";
		$cadena .=      "ID: " . $this->getIdModulo(). "\n".
					 	"Descripcion: " . $this->getDescripcion()."\n".
					 	"Tope de inscripcion: " . $this->getTope()."\n".
						"Costo: ". $this->getCosto()."\n".
						"Hora inicio: ". $this->getHoraInicio()."\n".
						"Hora cierre: ". $this->getHoraCierre().
						"Fecha: ". $this->getFecha();
		return $cadena;
	}
	public function darCostoModulo(){
        $arregloFunciones = [] ;
       
        $costoTotal = 0;
        $costoEnLinea = 0;
        $costoPresencial =0;
        foreach ($arregloFunciones as $objModulo) {
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
    
    function modificarModulo ($objModulo, $opcionModificar, $dato){
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
    }
	
}













?>