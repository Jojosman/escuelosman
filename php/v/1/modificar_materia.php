<?php include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_materia = $sql->obtenerResultado("CALL sp_select_materia_id('".$_POST['id_materia']."') ");

                                    ?>
<div class="col-md-12">
	<div class="card">
	  <div class="card-header">
	    <h5 class="title">Materias</h5>
	  </div>
	  <div class="card-body">
	    <div class="row">
	      <div class="col-md-4 px-1">
	        <div class="form-group">
	          <label>Materia</label>
	          <input type="text" id="nombre_materia" class="form-control" placeholder="Materia" value="<?php echo $row_materia[0]['nombre_materia']; ?>">
	        </div>
	      </div>
	      <div class="col-md-4 pl-1">
	        <div class="form-group">
	          <label for="apellido_paterno">Siglas</label>
	          <input type="text" id="siglas" class="form-control" placeholder="Siglas" value="<?php echo $row_materia[0]['siglas']; ?>">
	        </div>
	      </div>
	      <div class="col-md-4 pl-1">
	        <div class="form-group">
	          <label for="apellido_materno">Horas(a la semana)</label>
	          <input type="number" id="horas" class="form-control" placeholder="Horas" value="<?php echo $row_materia[0]['horas']; ?>">
	        </div>
	      </div>
	    </div>
	  <div class="card-footer">
	    <a href="#" class="btn btn-primary btn-block" id="modificar_materia" data-id="<?php echo $row_materia[0]['id_materia']; ?>">Modificar materia</a>
	  </div>
	</div>
</div>