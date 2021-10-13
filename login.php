<?php
    include "conexion.php";
    session_start();
    $mysqli = conectar();
    if($_POST){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $sql = "SELECT id, username, pass FROM usuario WHERE username='$usuario'";
        $resultado = mysqli_query($mysqli, $sql);
        $num = mysqli_num_rows($resultado);

        if($num>0){
            $row = mysqli_fetch_assoc($resultado);
            $password_bd = $row['pass'];

            if($password_bd == $password){

                $_SESSION['idusuario'] = $row['id'];
                $_SESSION['usuario'] = $row['username'];
                  header("Location: index.html");
            }else{
                $error ="Contraseña incorrecta";
                include_once 'login.php';
            }
        }else{
            $error ="El usuario no existe";
            include_once 'login.php';
        }
    }
    mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="es_mx">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">

  <title>Iniciar Sesión</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <link href="css/login.css" rel="stylesheet">
</head>
<body class="text-center">

  <main class="form-signin">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
      <img class="mb-4" src="img/logo.png" alt="" width="110" height="110">
      <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="admin" name="usuario" required="">
        <label for="floatingInput">Usuario</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Contraseña</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>

    </form>
  </main>
</body>
</html>