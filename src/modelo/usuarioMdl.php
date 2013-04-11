<?php
	
	class usuarioMdl {

		function buscar($usuario,$contrasena) {

			require ('dbdata.inc');
			require_once ('dbClass.php');

			$conexion = new DB ($host, $user, $pass, $bd);
			if (!$conexion->conectar())
				die('FALLO'.$conexion->errno.':'.$conexion->error);

			$consulta = "SELECT * FROM  usuario, sesion_usuario 
						 WHERE usuario.codigo = '$usuario'  
						 AND sesion_usuario.codigo='$usuario' 
						 AND sesion_usuario.pass='$contrasena'";

			//var_dump($consulta);

			$resultado = $conexion -> ejecutarConsulta($consulta);

			if(!$resultado) {
				$conexion->cerrar();
				return FALSE;
			}//if
			else {

				$conexion -> cerrar();
				return $resultado;
			}//else


		}//function buscar
	}//class usuario mdl
?>