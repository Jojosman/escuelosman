<?php 
session_start();
include_once("../m/SQLConexion.php");
$sql = new SQLConexion();

$rpta = $sql->obtenerResultado("CALL sp_select_login('".$_POST['matricula']."','".$_POST['curp']."')");

if ($rpta[0]['id_usuario'] > 0) {
	$_SESSION['id_usuario'] = $rpta[0]['id_usuario'];
	$_SESSION['privilegio'] = $rpta[0]['privilegio'];
	$response_array['status'] = 'success';
    $response_array['msg'] = 'Iniciando';
    $response_array['privilegio']=$_SESSION['privilegio'];
}else{
	$response_array['status'] = 'error';
    $response_array['msg'] = 'Datos incorrectos o usuario desactivado';
    echo "CALL sp_select_login('".$_POST['matricula']."','".$_POST['curp']."')";
}
header('Content-type: application/json');
echo json_encode($response_array);
?>