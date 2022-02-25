<?php
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();

$row_materias = $sql->obtenerResultado("CALL sp_select_materias()");
$total_row_materias = count($row_materias);
?>
<div class="col-md-12">
  <div class="card card-plain">
    <div class="card-header">
      <h4 class="card-title">Materias</h4>
      <div class="row">
        <div class="col-md-9">
          <input class="form-control" type="search" name="busqueda_materias" id="busqueda_materias" placeholder="Busqueda por nombre">
        </div>
        <div class="col-md-3"><a href="#!" id="btn_buscar_materia" class="btn btn-secundary">Buscar</a></div>
      </div>
      <p class="category">Se muestran todas las materias</p>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="tbl_maestros" class="table">
          <thead class=" text-primary">
            <th>ID</th>
            <th>Nombre</th>
            <th>Siglas</th>
            <th>Horas(a la semana)</th>
          </thead>
          <tbody>
            <?php for ($i=0; $i < $total_row_materias ; $i++) { ?>
            <tr>
              <td><?php echo $row_materias[$i]['id_materia']; ?></td>
              <td><?php echo $row_materias[$i]['nombre_materia']; ?></td>
              <td><?php echo $row_materias[$i]['siglas']; ?></td>
              <td><?php echo $row_materias[$i]['horas']; ?></td>
              <td><a href="#" id="editar_materia" data-id="<?php echo $row_materias[$i]['id_materia']; ?>" title="">Modificar</a></td>            
              <td><a href="#!" id="eliminar_materia" data-id="<?php echo $row_materias[$i]['id_materia']; ?>" title="">Eliminar</a></td>
            <tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
