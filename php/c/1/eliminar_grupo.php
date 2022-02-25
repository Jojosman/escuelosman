<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->obtenerResultadoSimple("CALL sp_delete_grupo('".$_POST['id_grupo']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'Grupo eliminado';
}else{
	$response_array['status'] = 'error';
    $response_array['msg'] = 'Error al eliminar';
    echo "CALL sp_delete_grupo('".$_POST['id_grupo']."')";
}

header('Content-type: application/json');
echo json_encode($response_array);
?>