<?php
include 'BaseDatos.php';
include 'Actividad.php';
include 'Modulo.php';
include 'enLinea.php';
include 'Inscripcion.php';
include 'Ingresante.php';

/**********************************MENU GENERAL*****************************************/
function menuOpciones(){
    do{
        echo "\n\t MENU DE OPCIONES:
              \n1) Ingresar una actividad.
              \n2) Eliminar actividad.
              \n3) Modificar datos de una actividad.
              \n4) Ingresar un modulo.
              \n5) Eliminar modulo.
              \n6) Modificar datos de un modulo.
              \n7) Ingresar inscripcion.
              \n8) Eliminar inscripcion.
              \n9) Modificar datos de una inscripcion.
              \n10) Lista de inscripciones.
              \n11) Lista de inscripciones a modulo especificio.
              \n12) Lista de inscripciones a una actividad especifica.
              \n13) Buscar dado un módulo todos aquellos registros que poseen el mismo DNI y aparecen mas
              de una vez.
              \n14) Listar la información de todas las actividades a las que se inscribió un ingresarte.
              \n15)Salir.
              \n OPCION: ";
        $opcion = trim(fgets(STDIN));
        
        if (!($opcion==1 || $opcion ==2 || $opcion ==3 || $opcion == 4 || $opcion == 5 || $opcion == 6 || $opcion == 7 || $opcion==8 || $opcion==9 || $opcion==10 || $opcion==11 || $opcion==12 || $opcion==13 || $opcion==14|| $opcion==15)){
            echo "Error. Ingrese una opcion valida. ";
        }
    }while (!($opcion==1 || $opcion ==2 || $opcion ==3 || $opcion == 4 || $opcion == 5 || $opcion == 6 || $opcion == 7 || $opcion==8 || $opcion==9 || $opcion==10 || $opcion==11 || $opcion==12 || $opcion==13 || $opcion==14 || $opcion==15));
    return $opcion;
}

function main (){
    
    do {
        //$ABMPersona = new ABM_Persona();
        //$ABMPase = new ABM_Pase();
        //$ABMParque = new ABM_Parque();
        //$ABMJuego= new ABM_Juegos();
        $opcionElegida = menuOpciones();
    
        // ------------------------------------------------------------------------------------        
        if ($opcionElegida==1){
            echo "Ingrese ID de la actividad: ";
            $idActividad = trim (fgets(STDIN));
            echo "Ingrese una descripcion corta de la actividad: ";
            $descCorta = trim(fgets(STDIN));
            echo "Ingrese una descripcion larga de la actividad: ";
            $descLarga = trim(fgets(STDIN));
            $actividad = new Actividad();
            $actividad -> cargar (null,$idActividad, $descCorta, $descLarga);
            $exito = $actividad->insertar();

            if ($exito) {
            echo "LA ACTIVIDAD FUE CARGADA A LA BD. \n";
            } else {
            echo "Error al cargar la actividad.\n";
            }
        }
        elseif ($opcionElegida==2){
            echo "Ingrese ID de la actividad que desea borrar: \n";
            $idActividad = trim(fgets(STDIN));
            $objActividadBusqueda = new Actividad();
            $respBusqueda = $objActividadBusqueda->Buscar($idActividad);
            if ($respBusqueda) {
                $exito = $objActividadBusqueda->eliminar($idActividad);
                if ($exito) {
                    echo "Borrado realizado correctamente\n";
                } else {
                    echo "Borrado no realizado correctamente\n";
                }
            } else {
                echo "Actividad inexistente\n";
            }
        }
        elseif ($opcionElegida==3){
            $objActividad = new Actividad();
			$rta = false;
            $coleccionActividades = $objActividad->listar("");
            foreach ($coleccionActividades as $actividad) {
            echo $actividad . "\n----------------------------------------------------------\n";
            }
			echo "Ingrese el ID de la actividad que desea modificar: \n";
			$idActividad = trim(fgets(STDIN));
				if ($objActividad->Buscar($idActividad) == true) {
					echo "Ingrese nueva descripcion corta: ";
					$descCortaNueva = trim(fgets(STDIN));
					echo "Ingrese nueva direccion: ";
					$descLargaNueva = trim(fgets(STDIN));
                    $objActividad->setIdActividad($idActividad);
					$objActividad->setDescCorta($descCortaNueva);
					$objActividad->setDescLarga($descLargaNueva);
					$rta = $objActividad->modificar();	
				}else{
					echo "\n -- No se encontro actividad con ese ID \n";
				}if($rta == true){
					echo "\n SE MODIFICO LA ACTIVIDAD\n";
					$colActividades = $objActividad->listar("");
					foreach ($colActividades as $actividad){	
						echo "-------------------------------------------------------";
						echo $actividad;
						echo "-------------------------------------------------------";
					}	
				}
				else{
					echo $objActividad->getMensajeOperacion();
				}
		}
        elseif ($opcionElegida==4){
            echo "Ingrese ID del modulo: ";
            $idModulo = trim (fgets(STDIN));
            echo "Ingrese una descripcion: ";
            $descripcion = trim(fgets(STDIN));
            echo "Ingrese un tope de inscripciones: ";
            $tope = trim(fgets(STDIN));
            echo "Ingrese el costo del modulo: ";
            $costo = trim(fgets(STDIN));
            echo "Ingrese la hora de inicio: ";
            $horaInicio = trim(fgets(STDIN));
            echo "Ingrese la hora de finalizacion: ";
            $horaCierre = trim(fgets(STDIN));
            echo "Ingrese la fecha del modulo (D/M/A): ";
            $fecha = trim(fgets(STDIN));
            $modulo = new Modulo();
            $modulo -> cargar (null, $idModulo, $descripcion, $tope, $costo,$horaInicio,$horaCierre,$fecha);
            $exito = $modulo->insertar();

            if ($exito) {
            echo "EL MODULO FUE INGRESADO A LA BD. \n";
            } else {
            echo "Error al cargar la actividad.\n";
            }
        }
        elseif ($opcionElegida==5){
            echo "Ingrese ID del modulo que desea borrar: \n";
            $idModulo = trim(fgets(STDIN));
            $objModuloBusqueda = new Modulo();
            $respBusqueda = $objModuloBusqueda->Buscar($idModulo);
            if ($respBusqueda) {
                $exito = $objModuloBusqueda->eliminar($idModulo);
                if ($exito) {
                    echo "Se elimino correctamente\n";
                } else {
                    echo "Error. No se elimino correctamente \n";
                }
            } else {
                echo "Modulo inexistente\n";
            }
        }
        elseif ($opcionElegida==6){
            $objModulo = new Modulo();
			$rta = false;
            $coleccionModulos = $objModulo->listar("");
            foreach ($coleccionModulos as $modulo) {
            echo $modulo . "\n----------------------------------------------------------\n";
            }
			echo "Ingrese el ID del modulo que desea modificar: \n";
			$idModulo = trim(fgets(STDIN));
				if ($objModulo->Buscar($idModulo) == true) {
					echo "Ingrese nueva descripcion: ";
					$descripcion = trim(fgets(STDIN));
					echo "Ingrese nuevo tope de inscripcion: ";
					$tope = trim(fgets(STDIN));
					echo "Ingrese nuevo costo: ";
					$costo = trim(fgets(STDIN));
					echo "Ingrese nueva hora de inicio: ";
					$horaInicio = trim(fgets(STDIN));
					echo "Ingrese nueva hora de cierre: ";
					$horaCierre = trim(fgets(STDIN));
					echo "Ingrese nueva fecha del modulo: ";
					$fecha = trim(fgets(STDIN));
                    $objModulo->setIdModulo($idModulo);
                    $objModulo->setDescripcion($descripcion);
					$objModulo->setTope($tope);
                    $objModulo->setCosto($costo);
                    $objModulo->setHoraInicio($horaInicio);
                    $objModulo->setHoraCierre($horaCierre);
                    $objModulo->setFecha($fecha);
					$rta = $objModulo->modificar();	
				}else{
					echo "\n -- No se encontro modulo con ese ID \n";
				}if($rta == true){
					echo "\n SE MODIFICO EL MODULO\n";
					$colModulos = $objModulo->listar("");
					foreach ($colModulos as $modulo){	
						echo "-------------------------------------------------------";
						echo $modulo;
						echo "-------------------------------------------------------";
					}	
				}else{
					echo $objModulo->getMensajeOperacion();
				}
        }
        elseif($opcionElegida==7){
            $rta=false;
            echo "Ingrese ID de la inscripcion: ";
            $id_inscripcion = trim (fgets(STDIN));
            echo "Ingrese la fecha de inscripcion (D/M/A): ";
            $fecha = trim(fgets(STDIN));
            echo "Ingrese el costo final de la inscripcion: ";
            $costo_final = trim(fgets(STDIN));
            $objModulo= new Modulo();
            $colModulos= $objModulo -> listar("");
                foreach ($colModulos as $modulo){
                        echo "-------------------------------------------------------";
						echo $modulo;
						echo "-------------------------------------------------------";
                }
                echo "\n Ingrese el ID del modulo: ";
                $id_modulo= trim(fgets(STDIN));
                $objModulo -> buscar ($id_modulo);
            $objIngresante= new Ingresante();
            $colIngresantes= $objIngresante -> listar("");
                foreach ($colIngresantes as $ingresante){
                    echo "-------------------------------------------------------";
                        echo $ingresante;
                        echo "-------------------------------------------------------";
                }
                echo "\n Ingrese el DNI del ingresante: ";
                $dni= trim(fgets(STDIN));
                $objIngresante-> buscar($dni);

            $objInscripcion = new Inscripcion();
            $colInscripciones = $objInscripcion -> listar ("");
                foreach ($colInscripciones as $inscripcion){
                    if ($objModulo -> getIdModulo() == $id_modulo) {
                        echo "No puede inscribirse al mismo modulo más de una vez.";
                        $value = false;
                    } else {
                        $value = true;
                    }
                } if ($value) {
                    $objInscripcion-> cargar($id_inscripcion, $fecha, $costo_final,$id_modulo,$dni);
                    $rta = $objInscripcion->insertar ();
                }
            
            if ($rta == true) {
                echo "LA INSCRIPCION FUE CARGADA A LA BD. \n";
                $colInscripciones = $objInscripcion->listar("");
                foreach ($colInscripciones as $inscripcion){
                    echo "-------------------------------------------------------";
						echo $inscripcion;
						echo "-------------------------------------------------------";
                }
            } else {
            echo "Error al cargar la inscripcion.\n";
            }
        }
        
        
        elseif ($opcionElegida==8){
            echo "Ingrese ID de la inscripcion que desea borrar: \n";
            $idInscripcion = trim(fgets(STDIN));
            $objInscripcionBusqueda = new Inscripcion();
            $respBusqueda = $objInscripcionBusqueda->Buscar($idInscripcion);
            if ($respBusqueda) {
                $exito = $objInscripcionBusqueda->eliminar($idInscripcion);
                if ($exito) {
                    echo "Se elimino correctamente\n";
                } else {
                    echo "Error. No se elimino correctamente \n";
                }
            } else {
                echo "Inscripcion inexistente\n";
            }
        }
        elseif ($opcionElegida==9){
            $objInscripcion = new Inscripcion();
			$rta = false;
            $coleccionInscripciones = $objInscripcion->listar("");
            foreach ($coleccionInscripciones as $inscripcion) {
            echo $inscripcion . "\n----------------------------------------------------------\n";
            }
			echo "Ingrese el ID de la inscripcion que desea modificar: \n";
			$idInscripcion = trim(fgets(STDIN));
				if ($objInscripcion->Buscar($idInscripcion) == true) {
					echo "Ingrese nueva fecha: ";
					$fecha = trim(fgets(STDIN));
					echo "Ingrese nuevo costo final: ";
					$costo = trim(fgets(STDIN));
                    $objInscripcion->setIdInscripcion($idInscripcion);
                    $objInscripcion->setFecha($fecha);
					$objInscripcion->setCostoFinal($costo);
					$rta = $objInscripcion->modificar();	
				}else{
					echo "\n -- No se encontro inscripcion con ese ID \n";
				}if($rta == true){
					echo "\n SE MODIFICO LA INSCRIPCION \n";
					$colInscripciones = $objInscripcion->listar("");
					foreach ($colInscripciones as $inscripcion){	
						echo "-------------------------------------------------------";
						echo $inscripcion;
						echo "-------------------------------------------------------";
					}	
				}else{
					echo $objInscripcion->getMensajeOperacion();
				}
        }
        elseif ($opcionElegida==10){
            $objInscripcion = new Inscripcion();
            $colInscripciones = $objInscripcion->listar("");
            foreach ($colInscripciones as $inscripcion) {
                echo  "\n--------------------------------------\n" . $inscripcion;
            }
        }
        elseif ($opcionElegida==11){
           echo "Ingrese el ID del modulo, para ver sus ingresantes: ";
           $idModulo = trim(fgets(STDIN));
           $objInscripcion = new Inscripcion();
           $colInscripciones = $objInscripcion->listar($idModulo);
            foreach ($colInscripciones as $inscripcion) {
                echo  "\n--------------------------------------\n" . $inscripcion;
            }
        }
        elseif ($opcionElegida==12){
           echo "Ingrese el ID de la actividad, para ver sus ingresantes: ";
           $idActividad = trim(fgets(STDIN));
           $objInscripcion = new Inscripcion();
           $colInscripciones = $objInscripcion->listar($idActividad);
            foreach ($colInscripciones as $inscripcion) {
                echo  "\n--------------------------------------\n" . $inscripcion;
            }
        }
        elseif ($opcionElegida==13){
           /**Buscar dado un módulo todos aquellos registros que poseen el mismo DNI y aparecen mas de una vez. */
            echo "Ingrese el ID del modulo: ";
            $idModulo = trim(fgets(STDIN));
            $objModuloBusqueda = new Modulo;
            $respBusqueda = $objModuloBusqueda ->buscar($idModulo);
            $objIngresante = new Ingresante();
            
            //NO TUVE TIEMPO DE CONTINUARLA O CORREGIRLA....


               
        }elseif($opcionElegida==14){
           echo "Ingrese el ID del ingresante, para ver sus actividades: ";
           $idIngresante = trim(fgets(STDIN));
           $objActividad = new Actividad();
           $colActividades = $objActividad->listar($idIngresante);
            foreach ($colActividades as $actividad) {
                echo  "\n--------------------------------------\n" . $actividad;
            }
        }
    }while ($opcionElegida<>15);
}

main();