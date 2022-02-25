<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();

$rpta = $sql->obtenerResultadoSimple("CALL sp_agregar_carrera('".$_POST['nombre_carrera']."','".$_POST['abreviatura']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'Carrera agregada';
}else{
	$response_array['status'] = 'error';
    $response_array['msg'] = 'Error al agregar';
    echo "CALL sp_agregar_carrera('".$_POST['nombre_carrera']."','".$_POST['abreviatura']."')";
}

header('Content-type: application/json');
echo json_encode($response_array);
?>