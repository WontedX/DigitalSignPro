<?php
    session_start();
   error_reporting(0);
   include 'conecta.php';
   if(isset($_POST['entrar'])){
   $ruser = $conecta->real_escape_string($_POST['usuario']);
   $rpass = $conecta->real_escape_string(md5($_POST['pass']));
   //generar una consulta que extraiga los datos de la bd
   $consulta = "SELECT * FROM prueba WHERE usuario = '$ruser' and password = '$rpass'";
   if($resultado = $conecta->query($consulta)){
    while($row = $resultado->fetch_array()){
        $userok= $row['usuario'];
        $passwordok = $row['password'];
    }
    $resultado->close();
   }
   $conecta->close();
if(isset($ruser) && isset($rpass)){
    if($ruser == $userok && $rpass == $passwordok){
    $_SESSION['login'] = TRUE;
    $_SESSION['usuario'] = $usuario;
    header("location:principal.php");
    }
    else{
        $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Oh no!</strong> Tus datos son incorrectos.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>";
        }
    }else{
        $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Oh no!</strong> Tus datos son incorrectos.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>";
        }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio de sesión</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-container {
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .login-container h2 {
      text-align: center;
    }
    .login-container form {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 20px;
    }
    .login-container input {
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 16px;
    }
    .login-container input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
    }
    .login-container input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Iniciar sesión</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <input type="text" name="usuario" placeholder="Nombre de usuario" required>
      <input type="password" name="pass" placeholder="Contraseña" required>
      <input type="submit" name= "entrar" value="Iniciar sesión">
    </form>
  </div>
</body>
</html>
