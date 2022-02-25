<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();

$rpta = $sql->obtenerResultadoSimple("CALL sp_agregar_materias('".$_POST['materia']."','".$_POST['siglas']."','".$_POST['horas']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'Materia agregada';
}else{
	$response_array['status'] = 'error';
    $response_array['msg'] = 'Error al agregar';
}

header('Content-type: application/json');
echo json_encode($response_array);
?>