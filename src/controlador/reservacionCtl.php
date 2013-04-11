<?php
	
	class reservacionCtl {

		function __construct(){

	     //Incluir modelo 
	      include('modelo/reservacionMdl.php');
	      //Crear el objeto del modelo
	      $this->modelo = new reservacionMdl();
	   	}//constructor

	   	function ejecutar () {

	    	//Si no hay accion definida en la variable,
	    	//entonces se listan los usuarios
	    	if (isset($_REQUEST['accion'])) {
		    	$action = $_REQUEST['accion'];
		      switch( $action ){
		        case "alta" :
		          $reservaciones_array = $this->modelo->alta($_REQUEST['id'],
		          									   $_REQUEST['salon'],
		          									   $_REQUEST['fecha_inicio'], 
		          									   $_REQUEST['fecha_final'],
		          									   $_REQUEST['hora_inicio'],
		          									   $_REQUEST['hora_final'],
		                                               $_REQUEST['usuario'],
		                                               $_REQUEST['motivo']);
		          //print_r($reservacions_array);
		        break;
		        case "baja" :
		          $reservaciones_array = $this->modelo->baja($_REQUEST['codigo']);
		          //echo "case insertar";
		          //var_dump($reservacions_array);
		        break;
		        case "consulta" :
		          $reservaciones_array = $this->modelo->consulta() ;
		        break;
		        default :
		          die ( '$action No es una accion valida ' );
		      }//switch
		    }//if isset

		    if (is_array($reservaciones_array) || is_object($reservaciones_array)) {
		      //Incluir la vista
		      include('vista/reservacionVst.php');
		    }
		    else {
		      //Se manda llamar la lista de errores
		      //die('No hay datos Ctl');
			}//else no es array*/
	  }//ejecutar
	}//class reservacionCtl
?>