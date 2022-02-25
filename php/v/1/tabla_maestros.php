<?php
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();

$row_maestros = $sql->obtenerResultado("CALL sp_select_maestros()");
$total_row_maestros = count($row_maestros);
?>
<div class="col-md-12">
  <div class="card card-plain">
    <div class="card-header">
      <h4 class="card-title">Maestros</h4>
      <div class="row">
        <div class="col-md-9">
          <input class="form-control" type="search" name="busqueda_maestros" id="busqueda_maestros" placeholder="Busqueda por apellido paterno">
        </div>
        <div class="col-md-3"><a href="#!" id="btn_buscar_maestro" class="btn btn-secundary">Buscar</a></div>
      </div>
      <p class="category">Se muestran todos los maestros</p>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="tbl_maestros" class="table">
          <thead class=" text-primary">
            <th>ID</th>
            <th>Nombre(s)</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Grado academico</th>
            <th>Fecha de Nacimiento</th>
            <th>Correo Eletrónico</th>
            <th>Telefono Celular</th>
            <th>Telefono Casa</th>
            <th>Dirección</th>
            <th>CURP</th>
            <th>Matricula</th>
          </thead>
          <tbody>
            <?php for ($i=0; $i < $total_row_maestros ; $i++) { ?>
            <tr>
              <td><?php echo $row_maestros[$i]['id_maestro']; ?></td>
              <td><?php echo $row_maestros[$i]['nombre_maestro']; ?></td>
              <td><?php echo $row_maestros[$i]['apellido_paterno']; ?></td>
              <td><?php echo $row_maestros[$i]['apellido_materno']; ?></td>
              <td><?php echo $row_maestros[$i]['grado_academico']; ?></td>
              <td><?php echo $row_maestros[$i]['fecha_nacimiento']; ?></td>
              <td><?php echo $row_maestros[$i]['correo']; ?></td>
              <td><?php echo $row_maestros[$i]['telefono_celular']; ?></td>
              <td><?php echo $row_maestros[$i]['telefono_casa']; ?></td>
              <td><?php echo $row_maestros[$i]['direccion']; ?></td>
              <td><?php echo $row_maestros[$i]['curp']; ?></td>
              <td><?php echo $row_maestros[$i]['matricula']; ?></td>
              <td><a href="#" id="editar_maestro" data-id="<?php echo $row_maestros[$i]['id_maestro']; ?>" title="">Modificar</a></td>            
              <td><a href="#!" id="eliminar_maestro" data-id="<?php echo $row_maestros[$i]['id_maestro']; ?>" title="">Eliminar</a></td>
            <tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap4.min.js"></script>
<script src="../js/datatables.js"></script>