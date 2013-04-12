<?php

class Usuario {
		
	//Atributos
	public $codigo;
	public $carrera;
	public $nombre;
	public $apellido;
	public $flag;
	public $correo;

	public $pass;
	public $permisos;
	public $activo;

	function crear($codigo, $carrera, $nombre, $apellido, $flag, $correo, $pass, $permisos,$activo) {

		$this->codigo = $codigo;
		$this->carrera = $carrera;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->flag = $flag;
		$this->correo = $correo;

		$this->pass = $pass;
		$this->permisos = $permisos;
		$this->activo = $activo;
	}//crear

}//class Usuario

?>