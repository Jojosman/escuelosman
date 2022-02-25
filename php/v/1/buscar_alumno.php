<?php 
include_once("../../m/SQLConexion.php");
$sql = new SQLConexion();
$row_alumnos = $sql->obtenerResultado("CALL sp_select_search_alumno('".$_POST['paterno']."') ");
$total_row_alumnos = count($row_alumnos);
																?>
<div class="col-md-12">
  <div class="card card-plain">
    <div class="card-header">
      <h4 class="card-title">Alumnos</h4>
      <div class="row">
        <div class="col-md-9">
          <input class="form-control" type="search" name="busqueda_alumno" id="busqueda_alumno" placeholder="Busqueda por apellido paterno" value="<?php echo $_POST['paterno']; ?>">
        </div>
        <div class="col-md-3"><a href="#!" id="btn_buscar_alumno" class="btn btn-secundary">Buscar</a></div>
      </div>
      <p class="category">Resultados de la Busqueda: "<?php echo $_POST['paterno']; ?>"</p>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="tbl_alumnos" class="table">
          <thead class=" text-primary">
            <th>ID</th>
            <th>Nombre(s)</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Sexo</th>
            <th>Fecha de Nacimiento</th>
            <th>Correo Eletrónico</th>
            <th>Telefono Celular</th>
            <th>Telefono Casa</th>
            <th>Dirección</th>
            <th>CURP</th>
            <th>Matricula</th>
            <th>Grupo</th>
            <th>Carrera</th>
          </thead>
          <tbody>
            <?php for ($i=0; $i < $total_row_alumnos ; $i++) { ?>
            <tr>
              <td><?php echo $row_alumnos[$i]['id_alumno']; ?></td>
              <td><?php echo $row_alumnos[$i]['nombre']; ?></td>
              <td><?php echo $row_alumnos[$i]['apellido_paterno']; ?></td>
              <td><?php echo $row_alumnos[$i]['apellido_materno']; ?></td>
              <td><?php echo $row_alumnos[$i]['sexo']; ?></td>
              <td><?php echo $row_alumnos[$i]['fecha_nacimiento']; ?></td>
              <td><?php echo $row_alumnos[$i]['correo']; ?></td>
              <td><?php echo $row_alumnos[$i]['telefono_celular']; ?></td>
              <td><?php echo $row_alumnos[$i]['telefono_casa']; ?></td>
              <td><?php echo $row_alumnos[$i]['direccion']; ?></td>
              <td><?php echo $row_alumnos[$i]['curp']; ?></td>
              <td><?php echo $row_alumnos[$i]['matricula']; ?></td>
              <td>IDGS</td>
              <td>8°A</td>
              <td><a href="#!" id="editar_alumno" data-id="<?php echo $row_alumnos[$i]['id_alumno']; ?>" title="">Modificar</a></td>            
              <td><a href="#!" id="eliminar_alumno" data-id="<?php echo $row_alumnos[$i]['id_alumno']; ?>" title="">Eliminar</a></td>
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