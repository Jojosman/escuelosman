<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->obtenerResultadoSimple("CALL sp_update_grupo('".$_POST['id_grupo']."','".$_POST['seccion']."','".$_POST['cuatrimestre']."','".$_POST['carrera']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'Grupo modificado';
}else{
	$response_array['status'] = 'error';
    echo "CALL sp_update_grupo('".$_POST['id_grupo']."','".$_POST['seccion']."','".$_POST['cuatrimestre']."','".$_POST['id_carrera']."')";
}

header('Content-type: application/json');
echo json_encode($response_array);
?>