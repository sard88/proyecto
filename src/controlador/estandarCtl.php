<?php

class estandarCtl {

   public $modelo;

   function __construct(){

    //Incluir modelo 
     require '../src/modelo/usuarioMdl.php';
     //Crear el objeto del modelo
     $this->modelo = new usuarioMdl();
   }//constructor

  function ejecutar () {

    //Si no hay accion definida en la variable,
    //entonces se listan los usuarios
    if (isset($_REQUEST['accion'])) {

     session_start();
     $action = $_REQUEST['accion'];

     require_once ('../src/modelo/dbdata.inc');
     require_once ('../src/modelo/dbClass.php');

     $conexion = new DB ($host, $user, $pass, $bd);
     if (!$conexion->conectar())
      die('FALLO'.$conexion->errno.':'.$conexion->error);

      //Limpiar variables
      $codigo = $conexion->limpiarVariable($_REQUEST['code']);
      $contrasena = $conexion->limpiarVariable($_REQUEST['pass']);

     if (preg_match("/^(A-Z){0,1}\w{6,9}$/", $codigo)) {
      echo "Si entro en el REGEX";
     }


      switch($action){

        case "login" :
          echo "login!";

          $usuario = $this->modelo->buscar($codigo,$contrasena);
          //print_r($alumnos_array);
        break;
        
        default :
          die ( '$action No es una accion valida ' );
      }//switch
    }//if isset

     if (is_array($usuario) || is_object($usuario)) {
       //Incluir la vista
       include('vista/usuarioVst.php');
     }
     else {
       //Se manda llamar la lista de errores
       die('No hay datos estandar Ctl');
    }//else no es array
  }//ejecutar

}//class
?>