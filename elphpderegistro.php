<?php
/////////////////////////////////////////PARA LA BASE DE DATOS////////////////////////////////////////////////////////////////////////////////////
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";
    $connection = mysqli_connect($host, $user, $pass);
    //llamdo al input de mdbasededatos
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellidos"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];


if(!$connection)
    {
        echo "No se ha podido conectar con el servidor";
    }
    else {
        //echo "<b><h3> Hemos conectado al servidor. </h3><b>";
    }
    //indicamos nombre de la base de datos
    $datab = "ingenieriabd";
    //Idicamos seleccion a la base de datos
    $db = mysqli_select_db($connection,$datab);

    if(!$db)
    {
        echo "No se ha podido encontar la base de datos";
    }
    else
    {
        //echo "<h3> Sus datos se han guardado y se le ha enviado un correo de confirmación, pronto nos pondremos en contacto con usted. ¡Gracias! </h3> ";
    }
    //insertar datos a la base de xamp
            
    $instruccion_SQL = "INSERT INTO `prueba`(`Id`, `nombre`, `apellido`, `usuario`, `password`) VALUES ('NULL','$nombre','$apellido','$usuario','$password')";
    
    $resultado = mysqli_query($connection,$instruccion_SQL);
    $consulta = "SELECT * FROM prueba";
    $result = mysqli_query($connection,$consulta);  

    mysqli_close($connection);

    header("Location: regist.html");
?>