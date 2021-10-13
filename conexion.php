<?php
	$mysqli = new mysqli("174.136.25.249", "geoconst_joaquin", "##joaquin##2021", "geoconst_sInventario");
	function conectar(){
		$servidor = "174.136.25.249";
		$usuario = "geoconst_joaquin";
		$password = "##joaquin##2021";
		$db = "geoconst_sInventario";

		$conexion = mysqli_connect($servidor, $usuario, $password,$db) 
        or die("Ha sucedido un error inexperado en la conexion de la base de datos");

    	return $conexion;
	}
?>