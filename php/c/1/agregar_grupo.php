<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();

$rpta = $sql->obtenerResultadoSimple("CALL sp_agregar_grupo('".$_POST['seccion']."','".$_POST['cuatrimestre']."','".$_POST['carrera']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'Grupo agregado';
}else{
	$response_array['status'] = 'error';
    $response_array['msg'] = 'Error al agregar';
    echo "CALL sp_agregar_grupo('".$_POST['seccion']."','".$_POST['cuatrimestre']."','".$_POST['carrera']."')";
}

header('Content-type: application/json');
echo json_encode($response_array);
?>