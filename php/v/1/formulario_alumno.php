<div class="col-md-12">
	<div class="card">
	  <div class="card-header">
	    <h5 class="title">Datos del Alumno</h5>
	  </div>
	  <div class="card-body">
	    <div class="row">
	      <div class="col-md-4 px-1">
	        <div class="form-group">
	          <label>Nombre</label>
	          <input type="text" id="nombre_alumno" class="form-control" placeholder="Nombre" value="">
	        </div>
	      </div>
	      <div class="col-md-4 pl-1">
	        <div class="form-group">
	          <label for="exampleInputEmail1">Apellido Paterno</label>
	          <input type="text" id="apellido_paterno" class="form-control" placeholder="Paterno" value="">
	        </div>
	      </div>
	      <div class="col-md-4 pl-1">
	        <div class="form-group">
	          <label for="exampleInputEmail1">Apellido Materno</label>
	          <input type="text" id="apellido_materno" class="form-control" placeholder="Materno" value="">
	        </div>
	      </div>
	    </div>
	    <div class="row">
	      <div class="col-md-4">
	        <label for="correo">Correo Electronico</label>
	        <input id="correo" type="mail" id="correo" class="form-control" placeholder="Correo Electronico" value="">
	      </div>
	      <div class="col-md-4">
	        <label for="fec_nac">Fecha de Nacimiento</label>
	        <input id="fec_nac" type="date" id="fec_nac" class="form-control" placeholder="Fecha de nacimiento" value="">
	      </div>
	      <div class="col-md-4">
	        <label for="sexo">Sexo</label>
	        <select name="sexo" id="sexo" class="form-control">
	          	<option selected="disabled">Selecciona un sexo</option>
	          	<option value="masculino">Masculino</option>
	          	<option value="femenino">Femenino</option>
	          </select>
	      </div>
	    </div>
	    <div class="row">
	      <div class="col-md-6 pr-1">
	        <div class="form-group">
	          <label>Matricula</label>
	          <input type="number" id="matricula" class="form-control" placeholder="Matricula" value="">
	        </div>
	      </div>
	      <div class="col-md-6 pl-1">
	        <div class="form-group">
	          <label>CURP</label>
	          <input type="text" id="curp" class="form-control" placeholder="CURP" value="">
	        </div>
	      </div>
	    </div>
	    <div class="row">
	      <div class="col-md-6">
	        <div class="form-group">
	          <label>Telefono Celular</label>
	          <input type="number" id="tel_celular" class="form-control" placeholder="Telefono Celular" value="">
	        </div>
	      </div>
	      <div class="col-md-6">
	        <div class="form-group">
	          <label>Telefono Casa</label>
	          <input type="number" id="tel_casa" class="form-control" placeholder="Telefono Casa" value="">
	        </div>
	      </div>
	    </div>
	    <div class="row">
	    	<div class="col-md-12">
		        <div class="form-group">
		          <label>Direccion</label>
		          <input type="text" id="direccion" class="form-control" placeholder="Calle Numero Colonia, Municipio" value="">
		        </div>
	      	</div>
	    </div>
	    <div class="row">
	      <div class="col-md-6">
	        <div class="form-group">
	          <label>Carrera</label>
	          <select name="carrera" id="carrera" class="form-control">
	          	<option selected="disabled">Selecciona una carrera</option>
	          	<option value="1">IDGS</option>
	          </select>
	        </div>
	      </div>
	      <div class="col-md-6">
	        <div class="form-group">
	          <label>Grupo</label>
	          <select name="grupo" id="grupo" class="form-control">
	          	<option selected="disabled">Selecciona un grupo</option>
	          	<option value="1">8°A</option>
	          </select>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="card-footer">
	    <a href="#!" class="btn btn-primary btn-block" id="agregar_alumnos">Agregar Alumno</a>
	  </div>
	</div>
</div>