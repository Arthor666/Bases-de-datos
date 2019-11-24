<?php
include 'databasecon.php';
include 'sesion.php';
$nombre=$_GET["nombre"];
$id=$_SESSION["usuario"];
$query="UPDATE usuario SET nombre='".$nombre."' WHERE idusuario=".$id.";";
pg_query($query) or die('La consulta fallo: ' . pg_last_error());
header("Location: pagina_principal.php");
include 'close.php';
?>
