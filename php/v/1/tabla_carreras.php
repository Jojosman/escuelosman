<?php
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();

$row_carreras = $sql->obtenerResultado("CALL sp_select_carreras()");
$total_row_carreras = count($row_carreras);
?>
<div class="col-md-12">
  <div class="card card-plain">
    <div class="card-header">
      <h4 class="card-title">Carreras</h4>
      <div class="row">
        <div class="col-md-9">
          <input class="form-control" type="search" name="busqueda_materias" id="busqueda_materias" placeholder="Busqueda por nombre">
        </div>
        <div class="col-md-3"><a href="#!" id="btn_buscar_materia" class="btn btn-secundary">Buscar</a></div>
      </div>
      <p class="category">Se muestran todas las carreras</p>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="tbl_maestros" class="table">
          <thead class=" text-primary">
            <th>ID</th>
            <th>Nombre</th>
            <th>Abrievatura</th>
          </thead>
          <tbody>
            <?php for ($i=0; $i < $total_row_carreras ; $i++) { ?>
            <tr>
              <td><?php echo $row_carreras[$i]['id_carrera']; ?></td>
              <td><?php echo $row_carreras[$i]['nombre']; ?></td>
              <td><?php echo $row_carreras[$i]['abreviatura']; ?></td>
              <td><a href="#!" id="editar_carrera" data-id="<?php echo $row_carreras[$i]['id_carrera']; ?>" title="">Modificar</a></td>            
              <td><a href="#!" id="eliminar_carrera" data-id="<?php echo $row_carreras[$i]['id_carrera']; ?>" title="">Eliminar</a></td>
            <tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
