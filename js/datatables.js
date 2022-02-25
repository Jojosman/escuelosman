// Call the dataTables jQuery plugin
$(document).ready(function() {
	var configuracion1 = {
		"language": {
			"emptyTable": "Datos no disponibles en tabla",
			"info": "Mostrando pagina _PAGE_ de _PAGES_",
			"infoEmpty": "No existen registros para mostrar",
			"lengthMenu": "Mostrar _MENU_ registros",
			"search": "Buscar:",
			"zeroRecords": "No se encontraron resultados similares en la busqueda",
			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
			"scrollX": "true",
			"paginate": {
				"previous": "Anterior",
				"next":	"Siguiente"
			}
		}
	};
	
	var configuracion2 = {
		"language": {
			"emptyTable": "Datos no disponibles en tabla",
			"info": "Mostrando pagina _PAGE_ de _PAGES_",
			"infoEmpty": "No existen registros para mostrar",
			"lengthMenu": "Mostrar _MENU_ registros",
			"search": "Buscar:",
			"zeroRecords": "No se encontraron resultados similares en la busqueda",
			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
			"scrollX": "true",
			"paginate": {
				"previous": "Anterior",
				"next":	"Siguiente"
			}
		},
		"paging":   	false,
        "ordering": 	false,
        "info":     	false,
		"searching":	false
	};

	var configuracion3 = {
		"language": {
			"emptyTable": "Datos no disponibles en tabla",
			"info": "Mostrando pagina _PAGE_ de _PAGES_",
			"infoEmpty": "No existen registros para mostrar",
			"lengthMenu": "Mostrar _MENU_ registros",
			"search": "Buscar:",
			"zeroRecords": "No se encontraron resultados similares en la busqueda",
			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
			"scrollX": "true",
			"paginate": {
				"previous": "Anterior",
				"next":	"Siguiente"
			}
		},
        "ordering": 	false,
	};
	
    //$('#tbl_alumnos').DataTable(configuracion3);
});