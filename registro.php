<?php
include 'databasecon.php';
$n_c=$_GET["n_c"];
$n_f=$_GET["n_f"];
$correo=$_GET["cor"];
$contra=$_GET["contra"];
$query = "INSERT INTO usuario VALUES ('".$n_f."','".$contra."','".$correo."',1,'".$n_c."');";
pg_query($query) or die('La consulta fallo: ' . pg_last_error());
//header("pagina_principal.html");
?>
