<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->obtenerResultadoSimple("CALL sp_update_maestro('".$_POST['id_maestro']."','".$_POST['nombre']."','".$_POST['paterno']."','".$_POST['materno']."','".$_POST['correo']."','".$_POST['fec_nac']."','".$_POST['matricula']."','".$_POST['curp']."','".$_POST['tel_celular']."','".$_POST['tel_casa']."','".$_POST['direccion']."','".$_POST['grado_academico']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'Maestro modificado';
}else{
	$response_array['status'] = 'error';
    $response_array['msg'] = 'Error al modificar';
}

header('Content-type: application/json');
echo json_encode($response_array);
?>