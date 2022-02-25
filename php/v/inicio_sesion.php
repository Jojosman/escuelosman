<!--Modal del registro-->
<div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true" >
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Inicia Sesión</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body  col-8 justify-content-center" style="display:block; margin: auto;">
				<div class="input-group mb-3">
				    <div class="input-group-prepend">
				      <span class="input-group-text">&nbsp;<i style="margin-top:33%;" class="fas fa-user-shield"></i>&nbsp;</span>
				    </div>
				    <input type="text" id="matricula_login" class="form-control" placeholder="Matriculas">
				  </div>
				  <div class="input-group mb-3">
				    <div class="input-group-prepend">
				      <span class="input-group-text">&nbsp;<i style="margin-top:33%;" class="fas fa-key"></i>&nbsp;&nbsp;</span>
				    </div>
				    <input type="text" class="form-control" id="curp_login" placeholder="CURP">
				  </div>
				  <p id="validacion" style="color:red"></p>
			</div>			
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btn_login">Acceder</button>
			</div>
		</div>	
	</div>
</div>