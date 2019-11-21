<?php
include 'databasecon.php';
$n_c=$_GET["n_c"];
$n_f=$_GET["n_f"];
$correo=$_GET["cor"];
$contra=$_GET["contra"];
$query = "INSERT INTO usuario (nombre_facebook,contrasenia,correo,idprivilegio,nombre) VALUES ('".$n_f."','".$contra."','".$correo."',1,'".$n_c."');";
pg_query($query) or die('La consulta fallo: ' . pg_last_error());
$query2 = "SELECT idusuario FROM usuario WHERE correo='".$correo."';";
$result=pg_query($query2) or die('La consulta fallo: ' . pg_last_error());
$row = pg_fetch_row($result);
include 'close.php';
session_start();
$_SESSION['usuario'] = $row[0];
$_SESSION['start']    = time();
$_SESSION['expire']   = $_SESSION['start'] + (60 * 60);
header("Location: pagina_principal.php");
?>
