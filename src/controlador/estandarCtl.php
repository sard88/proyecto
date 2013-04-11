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

     if (preg_match("/^[A-Z0-9][0-9]{6,8}$/", $codigo)) {
      echo "Si entro en el REGEX codigo____.";
     }//if regex codigo

     if (preg_match("/^[\w][\s|\w]{5,}$/", $contrasena)) {
      echo "si entro en el regex contraseña___.";
     }//if regex contraseña


      switch($action){

        case "login" :
          echo "login!";

          $usuario = $this->modelo->buscar($codigo,$contrasena);

        break;
        
        default :
          die ( '$action No es una accion valida ' );
      }//switch
    }//if isset

     if (is_array($usuario) || is_object($usuario)) {
        $_SESSION['activo']= true;
       //Incluir la vista
       include('../src/vista/usuarioVst.php');
     }
     else {
       //Se manda llamar la lista de errores
       die('No hay datos estandar Ctl');
    }//else no es array
  }//ejecutar

}//class
?>