<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->obtenerResultadoSimple("CALL sp_update_grupo('".$_POST['id_grupo']."','".$_POST['seccion']."','".$_POST['cuatrimestre']."','".$_POST['carrera']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'Grupo modificado';
}else{
	$response_array['status'] = 'error';
	$response_array['msg'] = 'Error al actualizar';
}

header('Content-type: application/json');
echo json_encode($response_array);
?>