<?php
	
	class alumnoCtl {

		function __construct(){

	     //Incluir modelo 
	      include('modelo/alumnoMdl.php');
	      //Crear el objeto del modelo
	      $this->modelo = new alumnoMdl();
	   	}//constructor

	   	function ejecutar () {

	    	//Si no hay accion definida en la variable,
	    	//entonces se listan los usuarios
	    	if (isset($_REQUEST['accion'])) {
		    	$action = $_REQUEST['accion'];
		      switch( $action ){
		        case "alta" :
		          $alumnos_array = $this->modelo->alta($_REQUEST['codigo'],
		          									   $_REQUEST['carrera'],
		          									   $_REQUEST['nombre'], 
		                                               $_REQUEST['apellido'],
		                                               $_REQUEST['flag'] 
		                                               $_REQUEST['pass']
		                                               $_REQUEST['permisos']
		                                               $_REQUEST['activo']);
		          //print_r($alumnos_array);
		        break;
		        case "baja" :
		          $alumnos_array = $this->modelo->baja($_REQUEST['codigo']);
		          //echo "case insertar";
		          //var_dump($alumnos_array);
		        break;
		        case "consulta" :
		          $alumnos_array = $this->modelo->consulta() ;
		        break;
		        default :
		          die ( '$action No es una accion valida ' );
		      }//switch
		    }//if isset

		    if (is_array($alumnos_array) || is_object($alumnos_array)) {
		      //Incluir la vista
		      include('vista/alumnoVst.php');
		    }
		    else {
		      //Se manda llamar la lista de errores
		      //die('No hay datos Ctl');
			}//else no es array*/
	  }//ejecutar


	}//class alumnoCtl
?>