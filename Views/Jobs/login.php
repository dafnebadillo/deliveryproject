<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "amazon";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//if (!$conn)
//{
//	die("No hay conexion: ".mysqli_connect_error());
//}

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT * FROM usuario WHERE usuario = '".$nombre."' and password = '".$pass."'");
$nr = mysqli_num_rows($query);

if ($nr == 1)
{
	//header("Location: pagina.html")
	//echo "Bienvenido: " .$nombre;
	require_once('bienvenido.php');
}
else if ($nr == 0) 
{
	echo "No ingreso, usuario no existe";
}

?>