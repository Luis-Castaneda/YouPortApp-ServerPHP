<?php 
header("Access-Control-Allow-Origin: *");
$conexion = mysqli_connect("localhost","root","acorde1234","you_port");

if(!$conexion){
	echo "No hay conexion con la base de datos ";
	echo mysql_error($conexion);
}

?> 
