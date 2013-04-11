<?php
	
	class maestroCtl {

		function __construct(){

	     //Incluir modelo 
	      include('modelo/maestroMdl.php');
	      //Crear el objeto del modelo
	      $this->modelo = new maestroMdl();
	   	}//constructor

	   	function ejecutar () {

	    	//Si no hay accion definida en la variable,
	    	//entonces se listan los usuarios
	    	if (isset($_REQUEST['accion'])) {
		    	$action = $_REQUEST['accion'];
		      switch( $action ){
		        case "alta" :
		          $maestros_array = $this->modelo->alta($_REQUEST['codigo'],
		          									   $_REQUEST['correo'],
		          									   $_REQUEST['nombre'], 
		                                               $_REQUEST['apellido'],
		                                               $_REQUEST['flag'] );
		          //print_r($maestros_array);
		        break;
		        case "baja" :
		          $maestros_array = $this->modelo->baja($_REQUEST['codigo']);
		          //echo "case insertar";
		          //var_dump($maestros_array);
		        break;
		        case "consulta" :
		          $maestros_array = $this->modelo->consulta() ;
		        break;
		        default :
		          die ( '$action No es una accion valida ' );
		      }//switch
		    }//if isset

		    if (is_array($maestros_array) || is_object($maestros_array)) {
		      //Incluir la vista
		      include('vista/maestroVst.php');
		    }
		    else {
		      //Se manda llamar la lista de errores
		      //die('No hay datos Ctl');
			}//else no es array*/
	  }//ejecutar


	}//class maestroCtl
?>