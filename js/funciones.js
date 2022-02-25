$(document).ready(function () {
	//Para llamar a modales
	/*
	$(document).on("click" ,"#modal_login", function(){
	  $.ajax({
	        url: "php/v/inicio_sesion.php",
	        success: function (respuesta) {
	            $("#content_medium").html(respuesta);
	            $("#mediumModal").modal("show");           
	        }
	    });
	});*/
	//Formulario login
	$(document).on("click" ,"#modal_login", function(){
		$("#form_login").slideToggle();
	});
	//Función de login
	$(document).on("click" ,"#btn_login", function(){
		//Variables
		var matricula = $("#matricula_login").val();
		var curp = $("#curp_login").val();
		//Peticion al servidor con un controlador
		$.ajax({
	        url: "php/c/login.php",
	        type: "POST",
	        data: "matricula=" + matricula + "&curp=" + curp,
	        success: function (respuesta) {
	        	if (respuesta.status == "success") {
	        		switch(respuesta.privilegio){
	        			case "1":
	        				console.log(respuesta.msg);
	        				console.log(respuesta.privilegio);
	        				window.location.href = 'admin/index.php';
	        				break;
	        			case "2":
	        				console.log(respuesta.msg);
	        				console.log(respuesta.privilegio);
	        				window.location.href = 'maestro/index.php';
	        				break;
        				case "3":
        					console.log(respuesta.msg);
        					console.log(respuesta.privilegio);
        					window.location.href = 'alumno/index.php';
	        				break;

	        		}
	        	}else{
	        		console.log('error');
	        	}
	        }
	    });
	});

	$(document).on('click', '#cerrar_sesion', function() {
		$.ajax({
			url: "../php/c/logout.php",
			success: function (respuesta){
				window.location.href = "index.php";
			}
		});
	});

	$(document).on('click','#ver_alumnos',function() {
		$(this).parent().parent().find(".active").removeClass('active');
		$(this).parent().addClass('active');
		vista_alumno();
	});

	function vista_alumno() {
		$.ajax({
			url: "../php/v/1/formulario_alumno.php",
			success: function (respuesta){
				$('#contenedor_formulario').html(respuesta);
			}
		});
		$.ajax({
			url: "../php/v/1/tabla_alumnos.php",
			success: function (respuesta){
				$('#contenedor_tabla').html(respuesta);
			}
		});
		//$('#tbl_alumnos').DataTable(	);
	}

	$(document).on('click','#agregar_alumnos',function() {
		//variables de ingresar alumno
		var nombre = $("#nombre_alumno").val();
		var paterno = $("#apellido_paterno").val();
		var materno = $("#apellido_materno").val();
		var correo = $("#correo").val();
		var fec_nac = $("#fec_nac").val();
		var matricula = $("#matricula").val();
		var curp = $("#curp").val();
		var sexo = $("#sexo").val();
		var tel_celular = $("#tel_celular").val();
		var tel_casa = $("#tel_casa").val();
		var direccion = $("#direccion").val();
		$.ajax({
			url: "../php/c/1/agregar_alumno.php",
			type: "POST",
	        data: "nombre=" + nombre + "&paterno=" + paterno + "&materno=" + materno + "&correo=" + correo + "&fec_nac=" + fec_nac + "&matricula=" + matricula + "&curp=" + curp + "&sexo=" + sexo + "&tel_celular=" + tel_celular + "&tel_casa=" + tel_casa + "&direccion=" + direccion,
			success: function (respuesta){
				if (respuesta.status == "success") {
					vista_alumno();
					console.log(respuesta.msg);
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});

	$(document).on("click","#eliminar_alumno",function(){
		var id_alumno = $(this).data("id");
		console.log(id_alumno);
		$.ajax({
			url: "../php/c/1/eliminar_alumno.php",
			type: "POST",
	        data: "id_alumno=" + id_alumno,
			success: function (respuesta){
				if (respuesta.status == "success") {
					console.log(respuesta.msg);
					vista_alumno();
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});
	$(document).on("click","#btn_buscar_alumno",function(){
		var paterno = $("#busqueda_alumno").val();
		$.ajax({
			url: "../php/v/1/buscar_alumno.php",
			type: "POST",
	        data: "paterno=" + paterno,
			success: function (respuesta){
				$('#contenedor_tabla').html(respuesta);
			}
		});
	});

	$(document).on("click","#editar_alumno",function(){
		var id_alumno = $(this).data("id");
		$.ajax({
			url: "../php/v/1/modificar_alumno.php",
			type: "POST",
	        data: "id_alumno=" + id_alumno,
			success: function (respuesta){
				$('#contenedor_formulario').html(respuesta);
			}
		});
	});
    $(document).on('click','#btn_modificar_alumno',function() {
	var id_alumno = $(this).data("id");
	//variables de ingresar alumno
	    var nombre = $("#nombre_alumno").val();
	    var paterno = $("#apellido_paterno").val();
		var materno = $("#apellido_materno").val();
		var correo = $("#correo").val();
		var fec_nac = $("#fec_nac").val();
		var matricula = $("#matricula").val();
		var curp = $("#curp").val();
		var sexo = $("#sexo").val();
		var tel_celular = $("#tel_celular").val();
		var tel_casa = $("#tel_casa").val();
		var direccion = $("#direccion").val();
		$.ajax({
			url: "../php/c/1/modificar_alumno.php",
			type: "POST",
	        data: "id_alumno=" + id_alumno + "&nombre=" + nombre + "&paterno=" + paterno + "&materno=" + materno + "&correo=" + correo + "&fec_nac=" + fec_nac + "&matricula=" + matricula + "&curp=" + curp + "&sexo=" + sexo + "&tel_celular=" + tel_celular + "&tel_casa=" + tel_casa + "&direccion=" + direccion,
			success: function (respuesta){
				if (respuesta.status == "success") {
					vista_alumno();
					console.log("Smn");
				}else{
					console.log("Nel");
				}
			}
		});
	});

	$(document).on('click','#ver_maestros',function() {
		$(this).parent().parent().find(".active").removeClass('active');
		$(this).parent().addClass('active');
		vista_maestro();
	});

	function vista_maestro() {
		$.ajax({
			url: "../php/v/1/formulario_maestro.php",
			success: function (respuesta){
				$('#contenedor_formulario').html(respuesta);
			}
		});
		$.ajax({
			url: "../php/v/1/tabla_maestros.php",
			success: function (respuesta){
				$('#contenedor_tabla').html(respuesta);
			}
		});
	}

	$(document).on('click','#agregar_maestro',function() {
		//variables de ingresar alumno
		var nombre = $("#nombre_maestro").val();
		var paterno = $("#apellido_paterno").val();
		var materno = $("#apellido_materno").val();
		var correo = $("#correo").val();
		var fec_nac = $("#fec_nac").val();
		var matricula = $("#matricula").val();
		var curp = $("#curp").val();
		var tel_celular = $("#tel_celular").val();
		var tel_casa = $("#tel_casa").val();
		var direccion = $("#direccion").val();
		var grado_academico = $("#grado_academico").val();
		$.ajax({
			url: "../php/c/1/agregar_maestro.php",
			type: "POST",
	        data: "nombre=" + nombre + "&paterno=" + paterno + "&materno=" + materno + "&correo=" + correo + "&fec_nac=" + fec_nac + "&matricula=" + matricula + "&curp=" + curp + "&grado_academico=" + grado_academico + "&tel_celular=" + tel_celular + "&tel_casa=" + tel_casa + "&direccion=" + direccion,
			success: function (respuesta){
				if (respuesta.status == "success") {
					vista_maestro();
					console.log(respuesta.msg);
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});

	$(document).on("click","#editar_maestro",function(){
		var id_alumno = $(this).data("id");
		$.ajax({
			url: "../php/v/1/modificar_maestro.php",
			type: "POST",
	        data: "id_maestro=" + id_alumno,
			success: function (respuesta){
				$('#contenedor_formulario').html(respuesta);
			}
		});
	});

	$(document).on('click','#modificar_maestro',function() {
		var id_maestro = $(this).data("id");
		//variables de ingresar alumno
	    var nombre = $("#nombre_maestro").val();
	    var paterno = $("#apellido_paterno").val();
		var materno = $("#apellido_materno").val();
		var correo = $("#correo").val();
		var fec_nac = $("#fec_nac").val();
		var matricula = $("#matricula").val();
		var curp = $("#curp").val();
		var tel_celular = $("#tel_celular").val();
		var tel_casa = $("#tel_casa").val();
		var direccion = $("#direccion").val();
		var grado_academico = $("#grado_academico").val();

		$.ajax({
			url: "../php/c/1/modificar_maestro.php",
			type: "POST",
	        data: "id_maestro=" + id_maestro + "&nombre=" + nombre + "&paterno=" + paterno + "&materno=" + materno + "&correo=" + correo + "&fec_nac=" + fec_nac + "&matricula=" + matricula + "&curp=" + curp + "&grado_academico=" + grado_academico + "&tel_celular=" + tel_celular + "&tel_casa=" + tel_casa + "&direccion=" + direccion,
			success: function (respuesta){
				if (respuesta.status == "success") {
					vista_alumno();
					console.log(respuesta.msg);
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});
	$(document).on("click","#eliminar_maestro",function(){
		var id_maestro = $(this).data("id");
		console.log(id_maestro);
		$.ajax({
			url: "../php/c/1/eliminar_maestro.php",
			type: "POST",
	        data: "id_maestro=" + id_maestro,
			success: function (respuesta){
				if (respuesta.status == "success") {
					console.log(respuesta.msg);
					vista_maestro();
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});
		$(document).on('click','#ver_materias',function() {
		$(this).parent().parent().find(".active").removeClass('active');
		$(this).parent().addClass('active');
		vista_materias();
	});

	$(document).on('click','#agregar_materia',function() {
		var materia = $("#nombre_materia").val();
		var siglas = $("#siglas").val();
		var horas = $("#horas").val();
		$.ajax({
			url: "../php/c/1/agregar_materia.php",
			type: "POST",
	        data: "materia=" + materia + "&siglas=" + siglas + "&horas=" + horas ,
			success: function (respuesta){
				if (respuesta.status == "success") {
					vista_materias();
					console.log(respuesta.msg);
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});
	$(document).on("click","#eliminar_materia",function(){
		var id_materia = $(this).data("id");
		$.ajax({
			url: "../php/c/1/eliminar_materia.php",
			type: "POST",
	        data: "id_materia=" + id_materia,
			success: function (respuesta){
				if (respuesta.status == "success") {
					console.log(respuesta.msg);
					vista_materias();
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});
	$(document).on("click","#editar_materia",function(){
		var id_materia = $(this).data("id");
		$.ajax({
			url: "../php/v/1/modificar_materia.php",
			type: "POST",
	        data: "id_materia=" + id_materia,
			success: function (respuesta){
				$('#contenedor_formulario').html(respuesta);
			}
		});
	});
    $(document).on('click','#modificar_materia',function() {
		var id_materia = $(this).data("id");

		var materia = $("#nombre_materia").val();
		var siglas = $("#siglas").val();
		var horas = $("#horas").val();

		$.ajax({
			url: "../php/c/1/modificar_materia.php",
			type: "POST",
	        data: "id_materia=" + id_materia + "&materia=" + materia + "&siglas=" + siglas + "&horas=" + horas ,
			success: function (respuesta){
				if (respuesta.status == "success") {
					vista_materias();
					console.log(respuesta.msg);
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});
	function vista_materias() {
		$.ajax({
			url: "../php/v/1/formulario_materias.php",
			success: function (respuesta){
				$('#contenedor_formulario').html(respuesta);
			}
		});
		$.ajax({
			url: "../php/v/1/tabla_materias.php",
			success: function (respuesta){
				$('#contenedor_tabla').html(respuesta);
			}
		});
	}
	$(document).on('click','#ver_carreras',function() {
		$(this).parent().parent().find(".active").removeClass('active');
		$(this).parent().addClass('active');
		vista_carreras();
	});

	function vista_carreras() {
		$.ajax({
			url: "../php/v/1/formulario_carreras.php",
			success: function (respuesta){
				$('#contenedor_formulario').html(respuesta);
			}
		});
		$.ajax({
			url: "../php/v/1/tabla_carreras.php",
			success: function (respuesta){
				$('#contenedor_tabla').html(respuesta);
			}
		});

	}
	$(document).on('click','#agregar_carrera',function() {
		var nombre_carrera = $("#nombre_carrera").val();
		var abreviatura = $("#abreviatura").val();
		$.ajax({
			url: "../php/c/1/agregar_carrera.php",
			type: "POST",
	        data: "nombre_carrera=" + nombre_carrera + "&abreviatura=" + abreviatura,
			success: function (respuesta){
				if (respuesta.status == "success") {
					vista_carreras();
					console.log(respuesta.msg);
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});
	$(document).on("click","#eliminar_carrera",function(){
		var id_carrera = $(this).data("id");
		$.ajax({
			url: "../php/c/1/eliminar_carrera.php",
			type: "POST",
	        data: "id_carrera=" + id_carrera,
			success: function (respuesta){
				if (respuesta.status == "success") {
					console.log(respuesta.msg);
					vista_carreras();
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});
	$(document).on("click","#editar_carrera",function(){
		var id_carrera = $(this).data("id");
		$.ajax({
			url: "../php/v/1/modificar_carreras.php",
			type: "POST",
	        data: "id_carrera=" + id_carrera,
			success: function (respuesta){
				$('#contenedor_formulario').html(respuesta);
			}
		});
	});
    $(document).on('click','#modificar_carrera',function() {
		var id_carrera = $(this).data("id");

		var nombre_carrera = $("#nombre_carrera").val();
		var abreviatura = $("#abreviatura").val();

		$.ajax({
			url: "../php/c/1/modificar_carrera.php",
			type: "POST",
	        data: "id_carrera=" + id_carrera + "&nombre_carrera=" + nombre_carrera + "&abreviatura=" + abreviatura,
			success: function (respuesta){
				if (respuesta.status == "success") {
					vista_carreras();
					console.log(respuesta.msg);
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});

	$(document).on('click','#ver_grupos',function() {
		$(this).parent().parent().find(".active").removeClass('active');
		$(this).parent().addClass('active');
		vista_grupos();
	});

	function vista_grupos() {
		$.ajax({
			url: "../php/v/1/formulario_grupos.php",
			success: function (respuesta){
				$('#contenedor_formulario').html(respuesta);
			}
		});
		$.ajax({
			url: "../php/v/1/tabla_grupos.php",
			success: function (respuesta){
				$('#contenedor_tabla').html(respuesta);
				setTimeout(function() {
	              $("#tbl_grupos").DataTable();
	            }, 100);
			}
		});

	}
	$(document).on('click','#agregar_grupo',function() {
		var seccion = $("#seccion").val();
		var cuatrimestre = $("#cuatrimestre").val();
		var carrera = $("#carrera").val();
		$.ajax({
			url: "../php/c/1/agregar_grupo.php",
			type: "POST",
	        data: "seccion=" + seccion + "&cuatrimestre=" + cuatrimestre + "&carrera=" + carrera,
			success: function (respuesta){
				if (respuesta.status == "success") {
					vista_grupos();
					console.log(respuesta.msg);
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});

	$(document).on("click","#eliminar_grupo",function(){
		var id_grupo = $(this).data("id");
		$.ajax({
			url: "../php/c/1/eliminar_grupo.php",
			type: "POST",
	        data: "id_grupo=" + id_grupo,
			success: function (respuesta){
				if (respuesta.status == "success") {
					console.log(respuesta.msg);
					vista_grupos();
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});
	
	$(document).on("click","#editar_grupo",function(){
		var id_grupo = $(this).data("id");
		$.ajax({
			url: "../php/v/1/modificar_grupo.php",
			type: "POST",
	        data: "id_grupo=" + id_grupo,
			success: function (respuesta){
				$('#contenedor_formulario').html(respuesta);
			}
		});
	});
    $(document).on('click','#modificar_grupo',function() {
		var id_grupo = $(this).data("id");

		var seccion = $("#seccion").val();
		var cuatrimestre = $("#cuatrimestre").val();
		var carrera = $("#carrera").val();

		$.ajax({
			url: "../php/c/1/modificar_grupo.php",
			type: "POST",
	        data: "id_grupo=" + id_grupo + "&seccion=" + seccion + "&cuatrimestre=" + cuatrimestre + "&carrera=" + carrera,
			success: function (respuesta){
				if (respuesta.status == "success") {
					vista_grupos();
					console.log(respuesta.msg);
				}else{
					console.log(respuesta.msg);
				}
			}
		});
	});
	
});