<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->obtenerResultadoSimple("CALL sp_delete_alumno('".$_POST['id_alumno']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'Alumno eliminado';
}else{
	$response_array['status'] = 'error';
    $response_array['msg'] = 'Error al eliminar';
    echo "CALL sp_delete_alumno('".$_POST['id_alumno']."')";
}

header('Content-type: application/json');
echo json_encode($response_array);
?>