<?php
session_start();

if(!isset($_SESSION['idusuario'])){
	header("Location: login.php");
}

$usuario = $_SESSION['usuario'];

?>

<?php
include "conexion.php";
$mysqli = conectar();
$sql = "SELECT id, descripcion, precio, cantidad, fregistro, fcaducidad FROM productos";    
$resultado = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html lang="es_mx">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<title>Sistema de Inventario</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>
<body>
	<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Abarrotes </a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="navbar-nav">
			<div class="nav-item text-nowrap">
				<a class="nav-link px-3" href="logout.php"><i data-feather="user"></i><?php echo $usuario; ?><i data-feather="log-out"></i></a>
			</div>
		</div>
	</header>
	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="position-sticky pt-3">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="index.php">
								<i data-feather="home"></i>
								INICIO
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php">
								<i data-feather="shopping-bag"></i>
								Inventario
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="registrar.php">
								<i data-feather="file-text"></i>
								Registrar producto
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="actualizar.php">
								<i data-feather="edit-2"></i>
								Actualizar Inventario
							</a>
						</li>
					</ul>

					<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
						<span>Reportes</span>
					</h6>
					<ul class="nav flex-column mb-2">
						<li class="nav-item">
							<a class="nav-link" href="producto_agotado.php">
								<span data-feather="trash-2"></span>
								Productos Agotados
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="producto_caducado.php">
								<span data-feather="calendar"></span>
								Productos Vencidos
							</a>
						</li>
					</ul>
				</div>
			</nav>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Actualizar Inventario</h1>
				</div>
				<div id="mensaje">
					
				</div>

				<div class="container-fluid" >
					<div class="container-sm" id="formulario">
						
						
					</div>
				</div>

				<div class="table-responsive">
					<table class="table table-striped table-sm">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Descripción del producto</th>
								<th scope="col">Precio</th>
								<th scope="col">Existencia</th>
								<th scope="col">F. Registro</th>
								<th scope="col">F. Caducidad</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php
							while($datos = mysqli_fetch_array($resultado))
							{
								$var = $datos[0]."||".$datos[1]."||".$datos[2]."||".$datos[3]."||".$datos[4]."||".$datos[5];
								?>
								<tr id="<?php echo $datos['id']; ?>">
									<th scope="row"><?php echo $datos['id']; ?></th>
									<td><?php echo $datos['descripcion']; ?></td>
									<td><?php echo $datos['precio']; ?></td>
									<td><?php echo $datos['cantidad']; ?></td>
									<td><?php echo $datos['fregistro']; ?></td>
									<td><?php echo $datos['fcaducidad']; ?></td>
									<td>
										<div class="d-grid gap-2 d-md-block">
											<button id="<?php echo $datos['id']; ?>e" type="button" class="btn btn-dark btn-sm" onclick="generarCampos('<?php echo $var; ?>');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
												<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
											</svg></button>
											<button id="<?php echo $datos['id']; ?>d" type="button" class="btn btn-dark btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
												<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
												<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
											</svg></button> 
										</div>
									</td>
								</tr>
								<?php 
							}
							mysqli_close($mysqli);
							?>
						</tbody>
					</table>
				</div>
			</main>
		</div>
	</div>
	<!-- choose one -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://unpkg.com/feather-icons"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	<script>
		feather.replace()
	</script>

</body>
</html>