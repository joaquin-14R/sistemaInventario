<?php
	session_start();
	include "conexion.php";
	$mysqli = conectar();

	if($_POST){
		$producto = $_POST['producto'];
		$precio = $_POST['precio'];
		$cantidad = $_POST['cantidad'];
		$fecharegistro = $_POST['fechar'];
		$fechacaducidad = $_POST['fechac'];
		$idUsuario = $_SESSION['idusuario'];

		$sql = "INSERT INTO productos VALUES('0','$producto', '$precio', '$cantidad', '$fecharegistro', '$fechacaducidad','$idUsuario')";
		$resultado = mysqli_query($mysqli, $sql);
		if($resultado){
			header("Location: registrar.php");
			echo "Producto_registrado";
		}else{
			echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
		}
		mysqli_close($mysqli);
	}
?>