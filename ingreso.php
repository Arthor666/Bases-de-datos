<?php
include 'databasecon.php';
$usuario=$_GET["usuario"];
$password=$_GET["pass"];
$query = "SELECT 'hola',idusuario from usuario WHERE correo='".$usuario."' AND contrasenia='".$password."'";
$result=pg_query($query) or die('La consulta fallo: ' . pg_last_error());
$row = pg_fetch_row($result);
include 'close.php';
if($row[0]=='hola'){
	session_start();
	$_SESSION["usuario"] = $row[1];
	$_SESSION['start']    = time();
    $_SESSION['expire']   = $_SESSION['start'] + (60 * 60);
	header("Location: pagina_principal.php");	
}else {
	echo'<script type="text/javascript">
    alert("Contraseña o Correo invalidos");
    window.location="inicia_sesion.html";
    </script>';
	
}
?>