<?php
	
	class salonCtl {

		function __construct(){

	     //Incluir modelo 
	      include('modelo/salonMdl.php');
	      //Crear el objeto del modelo
	      $this->modelo = new salonMdl();
	   	}//constructor

	   	function ejecutar () {

	    	//Si no hay accion definida en la variable,
	    	//entonces se listan los usuarios
	    	if (isset($_REQUEST['accion'])) {
		    	$action = $_REQUEST['accion'];
		      switch( $action ){
		        case "alta" :
		          $salones_array = $this->modelo->alta($_REQUEST['id'],
		          									   $_REQUEST['edificio'],
		          									   $_REQUEST['aula'], 
		                                               $_REQUEST['cupo'],
		                                               $_REQUEST['nombre'],
		                                               $_REQUEST['descripcion'],
		                                               $_REQUEST['espacios'] );
		          //print_r($salones_array);
		        break;
		        case "baja" :
		          $salones_array = $this->modelo->baja($_REQUEST['id']);
		          //echo "case insertar";
		          //var_dump($salones_array);
		        break;
		        case "consulta" :
		          $salones_array = $this->modelo->consulta() ;
		        break;
		        default :
		          die ( '$action No es una accion valida ' );
		      }//switch
		    }//if isset

		    if (is_array($salones_array) || is_object($salones_array)) {
		      //Incluir la vista
		      include('vista/salonVst.php');
		    }
		    else {
		      //Se manda llamar la lista de errores
		      //die('No hay datos Ctl');
			}//else no es array*/
	  }//ejecutar


	}//class salonCtl
?>