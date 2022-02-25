<?php include_once ("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_carreras = $sql->obtenerResultado("CALL sp_select_carrera_id('".$_POST['id_carrera']."') ");
?>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h5 class="title">Carreras</h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-4 px-1">
					<div class="form-group">
						<label>Nombre Carreras</label>
						<input type="text" id="nombre_carrera" class="form-control" placeholder="Nombre" value="<?php echo $row_carreras[0]['nombre']; ?>">
					</div>
				</div>
				<div class="col-md-4 pl-1">
					<div class="form-group">
						<label for="abreviatura">Abrieviatura</label>
						<input type="text" id="abreviatura" class="form-control" placeholder="Abrieviatura" value="<?php echo $row_carreras[0]['abreviatura']; ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
    		<a href="#!" class="btn btn-primary btn-block" id="modificar_carrera" data-id="<?php echo $row_carreras[0]['id_carrera']; ?>">Modificar carrera</a>
		</div>
	</div>

</div>	  




