<?php
	class reservacionMdl {

		function alta ($id, $salon, $fecha_inicio, $fecha_final, $hora_inicio, $hora_final, $usuario, $motivo) {


			require ('reservacionClass.php');
			$reservacion = new reservacion($id, $salon, $fecha_inicio, $fecha_final, 
										   $hora_inicio, $hora_final, $usuario, $motivo);
			$this->id = $id;
			$this->salon = $salon;
			$this->fecha_inicio = $fecha_inicio;
			$this->fecha_final = $fecha_final;
			$this->hora_inicio = $hora_inicio;
			$this->hora_final = $hora_final;
			$this->usuario = $usuario;
			$this->motivo = $motivo;

			require ('dbdata.inc');
			require ('dbClass.php');

			$conexion = new DB ($host, $user, $pass, $bd);
			if (!$conexion->conectar())
				//die('FALLO'.$conexion->errno.':'.$conexion->error);
				die('FALLO no se pudo conectar');
				
			//Crear query
			$query = "INSERT INTO reservar (id,salon,fecha_inicio,fecha_final,hora_inicio,hora_final,usuario,motivo) 
					  VALUES ('$this->id',
					  	 	  '$this->salon',
					  		  '$this->fecha_inicio', 
					  	      '$this->fecha_final', 
					  	      '$this->hora_inicio',
							  '$this->hora_final',
					  	 	  '$this->usuario',
					  	      '$this->motivo')";
			
			//Ejecutar el query
			$resultado = $conexion -> ejecutarConsulta($query);

			echo 'Resultado reservacionMdl   .';
			var_dump($resultado);

			if(!$resultado){
				//echo 'FALLO '.$conexion->errno.' : '.$conexion->error;
				echo 'FALLO  no hay resultado D:';
				//Cerrar la conexion
				$conexion -> cerrar();
				return FALSE;
			}//if
			else {
				return $reservacion;
			}//else
		}//function alta

		function baja ($codigo) {

			include ('reservacionClass.php');

			require_once('dbdata.inc');
			require ('dbClass.php');

			$conexion = new DB ($host, $user, $pass, $bd);
			if (!$conexion->conectar())
				die('FALLO'.$conexion->errno.':'.$conexion->error);

			echo 'Codigo: '.$codigo;
			//Crear query
			$query = 'DELETE FROM reservacion
						WHERE codigo = '.$codigo;

			$query_s = 'DELETE FROM sesion_reservacion
						WHERE codigo = '.$codigo;
			
			//Ejecutar el query
			$resultado = $conexion -> ejecutarConsulta($query);
			$resultado_s = $conexion -> ejecutarConsulta($query_s);

			if(!$resultado || !$resultado_s){
				//echo 'FALLO no hay resultado'.$conexion->errno.' : '.$conexion->error;
				echo 'FALLO no hay resultado o resultado_s';
				//Cerrar la conexion
				$conexion -> cerrar();
				return FALSE;
			}//if
			else {
				echo 'Si se pudo D:';
			}//else
		}//function baja

		function consulta() {
			require ('dbdata.inc');
			require ('dbClass.php');

			$conexion = new DB ($host, $user, $pass, $bd);
			if (!$conexion->conectar())
				die('FALLO'.$conexion->errno.':'.$conexion->error);

			$consulta = "SELECT * FROM reservacion";

			//Ejecutar consulta
			$resultado = $conexion -> ejecutarConsulta($consulta);

			if(!$resultado) {
				$conexion->cerrar();
				return FALSE;
			}//if
			else {

				$conexion -> cerrar();
				return $resultado;
			}//else

		}//listar
	}//class reservacionMdl
?>