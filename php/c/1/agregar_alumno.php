<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();

$rpta = $sql->obtenerResultadoSimple("CALL sp_agregar_alumno('".$_POST['nombre']."','".$_POST['paterno']."','".$_POST['materno']."','".$_POST['correo']."','".$_POST['fec_nac']."','".$_POST['matricula']."','".$_POST['curp']."','".$_POST['sexo']."','".$_POST['tel_celular']."','".$_POST['tel_casa']."','".$_POST['direccion']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'Alumno agregado';
}else{
	$response_array['status'] = 'error';
    $response_array['msg'] = 'Error al agregar';
}

header('Content-type: application/json');
echo json_encode($response_array);
?>