<?php
include "conexion.php";

$mysqli = conectar();

$id=$_POST['id'];

$sql = "DELETE FROM productos WHERE id='$id'";

if($result=mysqli_query($mysqli,$sql)){
	$cadena = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Producto Eliminado<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
	echo $cadena;
}else{
	$cadena = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Error! No se pudo borrar <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
	echo $cadena;
}


?>