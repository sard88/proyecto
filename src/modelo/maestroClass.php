<?php

class Maestro {
		
	//Atributos
	public $codigo;
	public $correo;
	public $nombre;
	public $apellido;
	public $rol;
	public $flag;
	public $pass;
	public $permisos;
	public $activo;

	function __construct($codigo, $carrera, $nombre, $apellido, $flag, $pass, $permisos, $activo) {

		$this->codigo = $codigo;
		$this->carrera = $carrera;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->flag = $flag;
		$this->pass = $pass;
		$this->permisos = $permisos;
		$this->activo = $activo;
	}//constructor
}//class Maestro

?>