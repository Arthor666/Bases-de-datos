<?php
include 'databasecon.php';
include 'sesion.php';
$correo=$_GET["correo"];
$query="UPDATE usuario SET correo='".$correo."' WHERE idusuario=".$_SESSION["usuario"].";";
pg_query($query) or die('La consulta fallo: ' . pg_last_error());
include 'close.php';
header("Location: pagina_principal.php");
?>
