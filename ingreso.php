<?php
include 'databasecon.php';
$usuario=$_GET["usuario"];
$password=$_GET["pass"];
$query = "SELECT 'hola',idusuario from usuario WHERE correo='".$usuario."' AND contrasenia='".$password."'";
$result=pg_query($query) or die('La consulta fallo: ' . pg_last_error());

$idusuario = "SELECT idusuario from usuario WHERE correo='".$usuario."' AND contrasenia='".$password."'";
$resultId=pg_query($idusuario) or die('La consulta fallo: ' . pg_last_error());

$row = pg_fetch_row($result);
if($row[0]=='hola'){
	session_start();
	$_SESSION["usuario"] = $row[1];
	$_SESSION['start']    = time();
    $_SESSION['expire']   = $_SESSION['start'] + (60 * 60);
    
    $Privilegio="SELECT idprivilegio FROM usuario WHERE idusuario='".$_SESSION['usuario']."'";
	$resultPrivilegio=pg_query($Privilegio) or die('La consulta fallo: ' . pg_last_error());
	$linea = pg_fetch_array($resultPrivilegio, null, PGSQL_ASSOC);
	foreach($linea as $col_value){
    	if($col_value=='1'){
			header("Location: pagina_principal.php");	
		}else if($col_value=='2'){
			header("Location: Administrador.php");
		}
	}
}else {
	echo'<script type="text/javascript">
    alert("Contraseña o Correo invalidos");
    window.location="inicia_sesion.html";
    </script>';
	
}
?>