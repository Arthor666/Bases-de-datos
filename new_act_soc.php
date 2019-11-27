<?php
include 'databasecon.php';
$lugar=$_GET['lugar'];
$fecha=$_GET['fecha'];
$hora=$_GET['hora'];
$esp=$_GET['esp'];
$id=$_GET['id'];
$query="SELECT nombre,lugar FROM match_social WHERE idcatalogo=".$id."AND fec_actividad='".$fecha."'";
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
$line = pg_fetch_array($result, null, PGSQL_ASSOC);
echo '<script>alert("Tum compañerito '.$line['nombre'].' Tiene esa misma actividad, no quieres participar con el?");</script>';
include 'close.php';
?>
