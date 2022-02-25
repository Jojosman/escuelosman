<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$rpta = $sql->obtenerResultadoSimple("CALL sp_update_materia('".$_POST['id_materia']."','".$_POST['materia']."','".$_POST['siglas']."','".$_POST['horas']."')");

if ($rpta){
	$response_array['status'] = 'success';
	$response_array['msg'] = 'Materia modificada';
	echo "CALL sp_update_materia('".$_POST['id_materia']."','".$_POST['materia']."','".$_POST['siglas']."','".$_POST['horas']."')";
}else{
	$response_array['status'] = 'error';
    $response_array['msg'] = 'Error al modificar';
    echo "CALL sp_update_materia('".$_POST['id_materia']."','".$_POST['materia']."','".$_POST['siglas']."','".$_POST['horas']."')";
}

header('Content-type: application/json');
echo json_encode($response_array);
?>