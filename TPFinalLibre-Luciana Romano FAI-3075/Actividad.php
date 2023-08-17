<?php
include_once 'BaseDatos.php';

class Actividad {
    private $idActividad;
    private $descCorta;
    private $descLarga;
    private $mensajeoperacion;

    public function __construct(){
        $this->idActividad ="";
        $this->descCorta ="";
        $this->descLarga ="";
    }
    //metodos de acceso 
    public function getIdActividad(){
        return $this->idActividad;
    }
    public function setIdActividad($id){
        $this->idActividad = $id;
    }

    public function getDescCorta(){
        return $this->descCorta;
    }
    public function setDescCorta($descCorta){
        $this->descCorta = $descCorta;
    }

    public function getDescLarga(){
        return $this->descLarga;
    }
    public function setDescLarga($descLarga){
        $this->descLarga = $descLarga;
    }

	public function getMensajeOperacion(){
		return $this->mensajeoperacion ;
	}
	public function setMensajeOperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

	//FUNCIONES DE LA CLASE ACTIVIDAD

	public function cargar($idActividad,$descCorta,$descLarga){		
		$this->setIdActividad($idActividad);
		$this->setDescCorta($descCorta);
		$this->setDescLarga($descLarga);
    }

    /**
	 * Recupera los datos de una actividad por id
	 * @param int $idActividad
	 * @return boolean
	 */		
    public function Buscar($idActividad){
		$base = new BaseDatos();
		$consultaBusqueda = "SELECT * from empresa where idActividad=".$idActividad;
		$resp = false;

		if($base->Iniciar()){
			if($base->Ejecutar($consultaBusqueda)){
				if($row2=$base->Registro()){					
				    $this->setIdActividad($idActividad);
					$this->setDescCorta($row2['descCorta']);
					$this->setDescLarga($row2['descLarga']);  
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
		$consultaInsertar="INSERT INTO actividad(idActividad, descCorta, descLarga) 
				VALUES ('".$this->getIdActividad()."','".$this->getDescCorta()."','".$this->getDescLarga()."')";
		
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

	/** Actualiza los datos de la tabla actividad en la base de datos que coincida con su id
     * @param ()
     * @return boolean 
    */
    public function modificar(){
	    $resp = false; 
	    $base = new BaseDatos();
		$consultaModifica="UPDATE actividad SET descCorta='".$this->getDescCorta()."',descLarga='".$this->getDescLarga().
                           "'WHERE idActividad=". $this->getIdActividad();

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
	
	/** Elimina el registro del objeto en la tabla de la base de datos
     * @param ()
     * @return boolean
     */
	public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->Iniciar()){
				$consultaBorra="DELETE FROM actividad WHERE descCorta=".$this->getDescCorta();
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

	/**Lista todas las actividades que cumplen con cierta condicion */
	public function listar($condicion=""){
	    $arregloActividad = null;
		$base=new BaseDatos();
		$consulta= "SELECT * from actividad ";
		if ($condicion!=""){
		    $consulta = $consulta.' where '.$condicion;
		}
		$consulta.=" ORDER BY idActividad ";
		
		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){				
				$arregloActividad= array();
				while($row2=$base->Registro()){
					
					$idActividad = $row2['idActividad'];
					$descCorta = $row2['descCorta'];
					$descLarga =$row2['descLarga'];
				
					$actividad = new Actividad();
					$actividad->cargar($idActividad,$descCorta,$descLarga);
					array_push($arregloActividad,$actividad);
				}
					
		 	}	else {
		 			$this->setMensajeOperacion($base->getError());
		 		
			}
		 }	else {
		 		$this->setMensajeOperacion($base->getError());
		 	
		 }	
		 return $arregloActividad;
	}	

	
	//metodo toString de la clase actividad
	public function __toString(){
		$cadena ="\n ACTIVIDAD \n";
		$cadena .="ID: " . $this->getIdActividad(). "\n".
					 	"Descripcion corta: " . $this->getDescCorta()."\n".
					 	"Descripcion larga: " . $this->getDescLarga()."\n";
		return $cadena;
	}
	/*
	function modificarActividad ($objModulo, $opcionModificar, $dato){
        if ($opcionModificar==1){
            $objModulo -> setDescCorta($dato);
        }
        elseif ($opcionModificar==2){
            $objModulo -> setDescLarga($dato);
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