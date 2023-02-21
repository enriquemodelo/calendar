<?php
$servermane = "localhost";
$database = "scem_produccion";
$usermane = "root";
$password = "root";

//Creamos la conexion
$con = mysqli_connect($servermane, $usermane, $password, $database);


//Comprobamos la conexion 

if(!$con){
    die("La conexión a fallado " . mysqli_connect_error());
}

//echo "Conexión éxitosa";

mysqli_close($con);

$mysqli = new mysqli('localhost', 'root', 'root', 'calendar');

?>