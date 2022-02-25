<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->obtenerResultadoSimple("CALL sp_delete_materia('".$_POST['id_materia']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'Materia eliminada';
}else{
	$response_array['status'] = 'error';
    $response_array['msg'] = 'Error al eliminar';
}

header('Content-type: application/json');
echo json_encode($response_array);
?>