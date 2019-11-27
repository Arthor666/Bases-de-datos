<?php
include 'databasecon.php';
include 'sesion.php';
function nuevo($fecha,$hora,$id,$esp,$lugar){
	$hora_i=substr($hora, 0,5);
	$hora_f=substr($hora, -5);
	$query2="INSERT INTO actividad (fec_actividad,hora_i,hora_f,idusuario,idlugar) VALUES('".$fecha."','".$hora_i."','".$hora_f."','".$_SESSION['usuario']."','".$lugar."')  RETURNING idactividad";
	$result=pg_query($query2) or die('La consulta fallo: ' . pg_last_error());
	$line = pg_fetch_array($result, null, PGSQL_ASSOC);
	$query4="INSERT INTO descripcio_lugar VALUES(".$lugar.",".$line['idactividad'].",'".$esp."');";
	pg_query($query4) or die('La consulta fallo: ' . pg_last_error());
	$query5="INSERT INTO actividad_materias VALUES(".$line['idactividad'].",".$id.");";
	pg_query($query5) or die('La consulta fallo: ' . pg_last_error());
	header("Location: pagina_principal.php");
}
$lugar=$_GET['lugar'];
$fecha=$_GET['fecha'];
$hora=$_GET['hora'];
$esp=$_GET['esp'];
$id=$_GET['id'];
$estado=$_GET['estado'];
if($estado==1){
	nuevo($fecha,$hora,$id,$esp,$lugar);
}
$query="SELECT nombre,lugar,idactividad FROM match_asesoria WHERE idmateria=".$id." AND fec_actividad='".$fecha."'";
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
$line = pg_fetch_array($result, null, PGSQL_ASSOC);
if(pg_num_rows ($result)!=0){
	echo "<script> var opc=confirm('Tu compañerito ".$line['nombre']." Tambien tiene esa actividad en ese horario, quieres participar con el ?'); if(opc==true){
		window.location= 'participa.php?act=".$line['idactividad']."'}else{window.location='new_act_asesoria.php?lugar=".$lugar."&&fecha=".$fecha."&&hora=".$hora."&&esp=".$esp."&&id=".$id."&&estado=1'}</script>";
}else{
	nuevo($fecha,$hora,$id,$esp,$lugar);
}
include 'close.php';
?>