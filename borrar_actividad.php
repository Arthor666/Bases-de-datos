<?php 
include 'databasecon.php';
include 'sesion.php';
$id=$_SESSION['usuario'];
$act=$_GET['act'];
$query="DELETE FROM actividad WHERE idusuario=".$id." AND idactividad=".$act.";";
pg_query($query) or die('La consulta fallo: ' . pg_last_error());
include 'close.php';
header("Location: mis_eventos.php");
?>