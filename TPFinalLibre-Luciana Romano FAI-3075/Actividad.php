<?php
include_once 'BaseDatos.php';

class Actividad {
    private $id_actividad;
    private $desc_corta;
    private $desc_larga;
	private $col_modulos;
	private $mensajeoperacion;

    public function __construct(){
        $this->id_actividad ="";
        $this->desc_corta ="";
        $this->desc_larga ="";
		$this->col_modulos=[];
	}
    //metodos de acceso 
    public function getIdActividad(){
        return $this->id_actividad;
    }
    public function setIdActividad($id){
        $this->id_actividad = $id;
    }

    public function getDescCorta(){
        return $this->desc_corta;
    }
    public function setDescCorta($desc_corta){
        $this->desc_corta = $desc_corta;
    }

    public function getDescLarga(){
        return $this->desc_larga;
    }
    public function setDescLarga($desc_larga){
        $this->desc_larga = $desc_larga;
    }
	public function getColModulos(){
        return $this->col_modulos;
    }
    public function setColModulos($col_modulos){
        $this->col_modulos = $col_modulos;
    }

	public function getMensajeOperacion(){
		return $this->mensajeoperacion ;
	}
	public function setMensajeOperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

	//FUNCIONES DE LA CLASE ACTIVIDAD

	public function cargar($id_actividad,$desc_corta,$desc_larga){		
		$this->setIdActividad($id_actividad);
		$this->setDescCorta($desc_corta);
		$this->setDescLarga($desc_larga);
    }

    /**
	 * Recupera los datos de una actividad por id
	 * @param int $idActividad
	 * @return boolean
	 */		
    public function Buscar($id_actividad){
		$base = new BaseDatos();
		$consultaBusqueda = "SELECT * from empresa where id_actividad=".$id_actividad;
		$resp = false;

		if($base->Iniciar()){
			if($base->Ejecutar($consultaBusqueda)){
				if($row2=$base->Registro()){					
				    $this->setIdActividad($id_actividad);
					$this->setDescCorta($row2['desc_corta']);
					$this->setDescLarga($row2['desc_larga']);  
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
		$consultaInsertar="INSERT INTO actividad(id_actividad, desc_corta, desc_larga) 
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
		$consultaModifica="UPDATE actividad SET desc_corta='".$this->getDescCorta()."',desc_larga='".$this->getDescLarga().
                           "'WHERE id_actividad=". $this->getIdActividad();

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
				$consultaBorra="DELETE FROM actividad WHERE desc_corta=".$this->getDescCorta();
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
		$consulta.=" ORDER BY id_actividad ";
		
		if($base->Iniciar()){
			if($base->Ejecutar($consulta)){				
				$arregloActividad= array();
				while($row2=$base->Registro()){
					
					$id_actividad = $row2['id_actividad'];
					$desc_corta = $row2['desc_corta'];
					$desc_larga =$row2['desc_larga'];
				
					$actividad = new Actividad();
					$actividad->cargar($id_actividad,$desc_corta,$desc_larga);
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
		return  "\n\t ACTIVIDAD: ".
				"\n ID Actividad: ".$this->getIdActividad().
				"\n Descripcion corta: ".$this->getDescCorta().
				"\n Descripcion larga: ".$this->getDescLarga().
				"\n Modulos: " .$this->modulosAString();
	}
	/**
	 * Retorna la coleccion de modulos en forma de string
	 */
	public function modulosAString(){
		$retorno = "";
		$arreglo = $this->getColModulos();
		foreach ($arreglo as $i){
			$retorno .= $i . "\n";
			$retorno .= "--------------------------------------\n";
		}
		return $retorno;
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