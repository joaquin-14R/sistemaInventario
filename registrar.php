<?php
session_start();

if(!isset($_SESSION['idusuario'])){
	header("Location: login.php");
}

$usuario = $_SESSION['usuario'];

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
					<h1 class="h2">Nuevo Articulo</h1>
				</div>

				<div class="container-fluid">
					<div class="container-sm">
						
						<form class="row g-3" method="post" action="validarRegistro.php" enctype= "multipart/form-data">
							<div class="col-md-12">
								<label for="inputproducto" class="form-label">Descripci??n del producto</label>
								<input type="text" class="form-control" id="inputproducto" placeholder="Descripci??n" required name="producto">
							</div>
							
							<div class="col-md-6">
								<label for="inputprecio" class="form-label">Precio</label>
								<input type="number" class="form-control" id="inputprecio" placeholder="$ Precio" required name="precio">
							</div>
							<div class="col-md-6">
								<label for="inputcantidad" class="form-label">Cantidad</label>
								<input type="number" class="form-control" id="inputcantidad" placeholder="# Unidades" required name="cantidad">
							</div>
							<div class="col-md-6">
								<label for="inputfregistro" class="form-label">Registro</label>
								<input type="date" class="form-control" id="inputfregistro" placeholder="Fecha registro" name="fechar">
							</div>
							<div class="col-md-6">
								<label for="inputfcaducidad" class="form-label">Caducidad</label>
								<input type="date" class="form-control" id="inputfcaducidad" placeholder="Fecha caducidad" name="fechac">
							</div>
							
							<div class="col-12">

								<input type="hidden"  class="form-control-file" id="idTT" name="idTTT">
							</div>
							<div class="col-12">
								<br>
								<button type="submit" class="btn btn-primary">Registrar</button>
							</div>
						</form>
					</div>
				</div>
			</main>
		</div>
	</div>
	<!-- choose one -->
	<script src="https://unpkg.com/feather-icons"></script>
	<script>
		feather.replace()
	</script>

</body>
</html>