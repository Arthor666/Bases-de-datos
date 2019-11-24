<?php
include 'databasecon.php';
include 'sesion.php';
$n_f=$_GET["n_f"];
$query="UPDATE usuario SET nombre_facebook='".$n_f."' WHERE idusuario=".$_SESSION["usuario"].";";
pg_query($query) or die('La consulta fallo: ' . pg_last_error());
include 'close.php';
header("Location: pagina_principal.php");
?>
