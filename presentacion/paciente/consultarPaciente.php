<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$paciente = new Paciente();
$pacientes = $paciente->consultarTodos();
include 'presentacion/menuAdministrador.php';
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">Consultar Paciente</div>
				<div class="card-body">
				<div class="form-group">
					<input id="filtro" type="text" name="filtro" class="form-control" placeholder="Ingrese Nombre">
				</div>

				<div id='tabla'></div>

				</div>
				
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modalPaciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>

<script>
	$('body').on('show.bs.modal', '.modal', function(e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>


<script type="text/javascript">
	$("table").on("click", "#ids .actualizar", function(event) {
		var elemento = $(this)[0].parentElement.parentElement;
		//event.preventDefault();
		id = $(this).attr("value");
		actEstado(id);
	});


	function actEstado(idS) {
		$.ajax({
			url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/paciente/editarEstadoPacienteAjax.php") ?>",
			type: "POST",
			data: {
				id: idS
			},
			success: function(response) {

				/*Swal.fire({
					position: "top-end",
					icon: "success",
					title: "Estado Actualizado",
					showConfirmButton: "false",
					timer: "500"
				});*/
				let datos = JSON.parse(response);
				$("#icon" + idS).removeClass();
				$("#icon" + idS).addClass(datos['icon']);
				$("#icon" + idS).attr('data-original-title', datos['tooltip']);
				$("#cambiarEstado" + idS).attr('data-original-title', datos['tooltip2']);
				$("#cambiarEstado" + idS).tooltip('hide');
				$("#cambiarEstado" + idS).tooltip('show');
			}
		});
	}
</script>


<!--<script type="text/javascript">
<?php //  foreach ($pacientes as $p) { 
?>

$(document).on('click', '#cambiarEstado<?php //  echo $p -> getId(); ?>', function(){
	var id = <?php // echo $p -> getId(); ?>;

	<?php //  echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/paciente/editarEstadoPacienteAjax.php") . " \";\n"; 
	?>
	
	$.post(ruta, {id}, function(response){
	
		Swal.fire({
			position: "top-end",
			icon: "success",
			title: "Estado Actualizado",
			showConfirmButton: "false",
			timer: "1000"
		});

		let datos = JSON.parse(response);
		$("#icon" + idS).removeClass();
		$("#icon" + idS).addClass(datos['icon']);
		$("#icon" + idS).attr('data-original-title', datos['tooltip']);
		$("#cambiarEstado" + idS).attr('data-original-title', datos['tooltip2']);
		$("#cambiarEstado" + idS).tooltip('hide');
		$("#cambiarEstado" + idS).tooltip('show');
	})
	
})
<?php  // }
?>

</script>-->

<script>

$("#filtro").keyup(function(e){
	let nombre = $("#filtro").val();
	$.ajax({
    	url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/paciente/filtrarPaciente.php") ?>",
        type: "POST",
        data: {
                nombre
            },
        success: function(response) {
			
			let datos = JSON.parse(response);

			console.log(datos);

			let tabla = '<table class="table table-striped table-hover"> <thead><tr><th scope="col">Id</th><th scope="col">Nombre</th><th scope="col">Apellido</th><th scope="col">Correo</th><th scope="col">Estado</th><th scope="col">Telefono</th><th scope="col">Direccion</th><th scope="col">Servicios</th></tr></thead><tbody id="ids">';

			datos.forEach(fila => {
				tabla += `<tr id='${fila.id}'>
				<td>${fila.id}</td>
				<td>${fila.nombre}</td>
				<td>${fila.apellido}</td>
				<td>${fila.correo}</td>
				<td><span style='z-index: 1' id='icon${fila.id}' class='${fila.estado}' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='${fila.tooltip1}'></span></td>
				<td>${fila.telefono}</td>
				<td>${fila.direccion}</td>
				<td><a href='modalPaciente.php?idPaciente=${fila.id}' data-toggle='modal' data-target='#modalPaciente' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
                       <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarPaciente.php") . "&idPaciente=${fila.id}' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                       <a class='fas fa-camera' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarFotoPaciente.php") . "&idPaciente=${fila.id}' data-toggle='tooltip' data-placement='left' title='Actualizar Foto'> </a>
                       <div style='color: #007bff;'  id='cambiarEstado${fila.id}' value='${fila.id}' class='fas fa-power-off actualizar'  data-toggle='tooltip' data-placement='left' data-original-title='${fila.tooltip2}'> </div></td>
				 `
			});

			$("#tabla").html(tabla);
        }
        });

});


</script>

