<?php
	class alumnoMdl {

		public $alumno;

		function alta ($codigo, $carrera, $nombre, $apellido, $flag, $pass, $permisos, $activo) {


			require ('alumnoClass.php');
			$alumno = new Alumno($codigo, $carrera, $nombre, $apellido, $flag, $pass, $permisos, $activo);
			$this->codigo = $codigo;
			$this->carrera = $carrera;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->flag = $flag;
			$this->pass = $pass;
			$this->permisos = $permisos;
			$this->activo = $activo;

			require ('dbdata.inc');
			require ('dbClass.php');

			$conexion = new DB ($host, $user, $pass, $bd);
			if (!$conexion->conectar())
				//die('FALLO'.$conexion->errno.':'.$conexion->error);
				die('FALLO no se pudo conectar');
				
			//Crear query
			$query = "INSERT INTO alumno (codigo, carrera, nombre, apellido, flag) 
					  VALUES ('$this->codigo',
					  	 	  '$this->carrera',
					  		  '$this->nombre', 
					  	      '$this->apellido', 
					  	      '$this->flag')";
			
			$query_s = "INSERT INTO sesion_alumno (codigo, pass, permisos, activo) 
					  VALUES ('$this->codigo',
					  	 	  '$this->pass',
					  		  '$this->permisos', 
					  	      '$this->activo')";
			
			//Ejecutar el query
			$resultado = $conexion -> ejecutarConsulta($query);
			$resultado_s = $conexion -> ejecutarConsulta($query_s);

			echo 'Resultado alumnoMdl   .';
			var_dump($resultado);
			var_dump($resultado_s);

			if(!$resultado || !$resultado_s){
				//echo 'FALLO '.$conexion->errno.' : '.$conexion->error;
				echo 'FALLO  no hay resultado o resultado_s D:';
				//Cerrar la conexion
				$conexion -> cerrar();
				return FALSE;
			}//if
			else {
				return $alumno;
			}//else
		}//function alta

		function baja ($codigo) {

			include ('alumnoClass.php');

			require_once('dbdata.inc');
			require ('dbClass.php');

			$conexion = new DB ($host, $user, $pass, $bd);
			if (!$conexion->conectar())
				die('FALLO'.$conexion->errno.':'.$conexion->error);

			echo 'Codigo: '.$codigo;
			//Crear query
			$query = 'DELETE FROM alumno
						WHERE codigo = '.$codigo;

			$query_s = 'DELETE FROM sesion_alumno
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

			$consulta = "SELECT * FROM alumno";

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
	}//class alumnoMdl
?>