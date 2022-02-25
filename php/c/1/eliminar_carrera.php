<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->obtenerResultadoSimple("CALL sp_delete_carrera('".$_POST['id_carrera']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'Carrera eliminada';
}else{
	$response_array['status'] = 'error';
    $response_array['msg'] = 'Error al eliminar';
}

header('Content-type: application/json');
echo json_encode($response_array);
?>