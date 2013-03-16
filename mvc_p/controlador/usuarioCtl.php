<?php
	
	class usuarioCtl {

		function __construct(){

	     //Incluir modelo 
	      include('modelo/alumnoMdl.php');
	      include('modelo/maestroMdl.php');

	   	function esAlumno () {
	   		if (isset($_REQUEST['accion'])) {
	   			if(strlen($_REQUEST['codigo'])==1)
	   				return true;
	   		}//si hay request
	   		return false;
	   	}//es alumno

		
	   	function esMaestro () {
	   		if (isset($_REQUEST['accion'])) {
	   			if(strlen($_REQUEST['codigo'])==7)
	   				return true;
	   		}//si hay request
	   		return false;
	   	}//es alumno	   	


	    if (esAlumno()) {
	    	echo "  Es Alumno   .";
		    //Crear el objeto del modelo
		    $this->modelo = new alumnoMdl();
	  	}//es alumno
	  	else if (esMaestro()) {
	  	  	echo "  Es maestro   .";
	  	  	//Crear el objeto del modelo
		    $this->modelo = new maestroMdl();
	  	  }//es maestro
	   	}//constructor

	   	function ejecutar () {

	    	//Si no hay accion definida en la variable,
	    	//entonces se listan los usuarios
	    	if (isset($_REQUEST['accion'])) {
		    	$action = $_REQUEST['accion'];
		      switch( $action ){
		        case "alta" :
		          $usuarios_array = $this->modelo->alta($_REQUEST['codigo'],
		          									   $_REQUEST['comodin'],
		          									   $_REQUEST['nombre'], 
		                                               $_REQUEST['apellido'],
		                                               $_REQUEST['flag'],
		                                               $_REQUEST['pass'],
		                                               $_REQUEST['permisos'],
		                                               $_REQUEST['activo']);

		          //print_r($usuarios_array);
		        break;
		        case "baja" :
		          $usuarios_array = $this->modelo->baja($_REQUEST['codigo']);
		          //echo "case insertar";
		          //var_dump($usuarios_array);
		        break;
		        case "consulta" :
		          $usuarios_array = $this->modelo->consulta() ;
		        break;
		        default :
		          die ( '$action No es una accion valida ' );
		      }//switch
		    }//if isset

		    if (is_array($usuarios_array) || is_object($usuarios_array)) {
		      //Incluir la vista
		      include('vista/usuarioVst.php');
		    }
		    else {
		      //Se manda llamar la lista de errores
		      //die('No hay datos Ctl');
			}//else no es array*/
	  }//ejecutar


	}//class usuarioCtl
?>