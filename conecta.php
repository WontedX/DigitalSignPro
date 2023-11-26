<?php
$user = "root";
$pass = "";
$host = "localhost";
    $connection = mysqli_connect($host, $user, $pass);

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
    }

 ?>