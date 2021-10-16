<?php
include "conexion.php";
	//mysqli_set_charset($conexion, "utf8");
$mysqli = conectar();

$act_id=$_POST['idarti'];
$act_precio=$_POST['precioact'];
$act_cantidad=$_POST['cantidadact'];
$act_fechar=$_POST['fecharact'];
$act_fechac=$_POST['fechacact'];


$sql = "UPDATE productos SET precio='$act_precio', cantidad='$act_cantidad', fregistro='$act_fechar', fcaducidad='$act_fechac' WHERE id='$act_id'";
if($result=mysqli_query($mysqli,$sql)){
	header("Location: actualizar.php");
}
?>