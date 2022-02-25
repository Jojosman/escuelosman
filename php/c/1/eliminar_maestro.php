<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->obtenerResultadoSimple("CALL sp_delete_maestro('".$_POST['id_maestro']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'Maestro eliminado';
}else{
	$response_array['status'] = 'error';
    $response_array['msg'] = 'Error al eliminar';
    echo "CALL sp_delete_maestro('".$_POST['id_maestro']."')";
}

header('Content-type: application/json');
echo json_encode($response_array);
?>