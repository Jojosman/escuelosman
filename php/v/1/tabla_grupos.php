<?php
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();

$row_grupo = $sql->obtenerResultado("CALL sp_select_grupos()");
$total_row_grupo = count($row_grupo);
?>
<div class="col-md-12">
  <div class="card card-plain">
    <div class="card-header">
      <h4 class="card-title">Grupos</h4>
      <div class="row">
        <div class="col-md-9">
          <input class="form-control" type="search" name="busqueda_materias" id="busqueda_materias" placeholder="Busqueda por nombre">
        </div>
        <div class="col-md-3"><a href="#!" id="btn_buscar_materia" class="btn btn-secundary">Buscar</a></div>
      </div>
      <p class="category">Se muestran todos los grupos</p>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="tbl_grupos" class="table">
          <thead class=" text-primary">
            <th>ID</th>
            <th>Seccion</th>
            <th>Cuatrimeste</th>
            <th>Carrera</th>
          </thead>
          <tbody>
            <?php for ($i=0; $i < $total_row_grupo ; $i++) { ?>
            <tr>
              <td><?php echo $row_grupo[$i]['id_grupo']; ?></td>
              <td><?php echo $row_grupo[$i]['seccion']; ?></td>
              <td><?php echo $row_grupo[$i]['cuatri']; ?></td>
              <td><?php echo $row_grupo[$i]['abreviatura']; ?></td>
              <td><a href="#!" id="editar_grupo" data-id="<?php echo $row_grupo[$i]['id_grupo']; ?>" title="">Modificar</a></td>            
              <td><a href="#!" id="eliminar_grupo" data-id="<?php echo $row_grupo[$i]['id_grupo']; ?>" title="">Eliminar</a></td>
            <tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
