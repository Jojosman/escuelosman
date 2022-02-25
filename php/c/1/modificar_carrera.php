<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->obtenerResultadoSimple("CALL sp_update_carrera('".$_POST['id_carrera']."','".$_POST['nombre_carrera']."','".$_POST['abreviatura']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'carrera modificada';
}else{
	$response_array['status'] = 'error';
    $response_array['msg'] = 'Error al modificar';
}

header('Content-type: application/json');
echo json_encode($response_array);
?>