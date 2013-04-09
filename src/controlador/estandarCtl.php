<?php

class estandarCtl {

   public $modelo;

   function __construct(){

     //Incluir modelo 
      include('modelo/usuarioBss.php');
      //Crear el objeto del modelo
      $this->modelo = new usuarioBss();
   }//constructor

  function ejecutar () {

    //Si no hay accion definida en la variable,
    //entonces se listan los usuarios
    if (isset($_REQUEST['accion'])) {
       $action = $_REQUEST['accion'];
       switch( $action ){
         case "listar" :
           echo "Listar!";
           $alumnos_array = $this->modelo->listar();
           //print_r($alumnos_array);
         break;
         case "insertar" :
           $alumnos_array = $this->modelo->insertarAlumno($_REQUEST['nombre'] , 
                                                          $_REQUEST['apellido'],
                                                          $_REQUEST['edad'] ) ;
           //echo "case insertar";
           //var_dump($alumnos_array);
         break;
         case "consultar" :
           $alumnos_array = $this->modelo->consultar_id( $_REQUEST['id'] ) ;
         break;
         default :
           die ( '$action No es una accion valida ' );
       }//switch
     }//if isset

     if (is_array($alumnos_array) || is_object($alumnos_array)) {
       //Incluir la vista
       include('vista/usuarioListaView.php');
     }
     else {
       //Se manda llamar la lista de errores
       die('No hay datos estandar Ctl');
    }//else no es array*/
  }//ejecutar

}//class