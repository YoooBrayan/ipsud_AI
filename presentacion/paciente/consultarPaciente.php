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
			<div class="card mt-3">
				<div class="card-header bg-primary text-white">Consultar Paciente</div>
				<div class="card-body">
				<div class="form-group d-flex">
					<i class="fas fa-search" style="font-size: 1.3em; margin-top:9px; margin-right: 5px; color:#007bff;" data-toggle="tooltip" data-placement="left" title="Buscar"></i>
					<input id="filtro" type="text" name="filtro" class="form-control" placeholder="Ingrese Nombre o identificacion">
				</div>

				<div id='resultado'></div>

				</div>
				
			</div>
		</div>
	</div>
	<a target="_blank" href="index.php?pid= <?php echo base64_encode("presentacion/paciente/generarPacientesPDF.php") ?>" id="pdf" style="margin-top: 15px" type="button" class="btn btn-primary">Generar PDF</a>
	<a target="_blank" href="index.php?pid= <?php echo base64_encode("presentacion/paciente/citasPacientesPDF.php") ?>" id="pdf" style="margin-top: 15px" type="button" class="btn btn-primary">Citas PDF</a>
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
	})


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
		})
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

	if(nombre!="" && nombre!=" "){
		$("#resultado").show();
		<?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/paciente/filtrarPaciente.php")."\";";?>
		$("#resultado").load(ruta, {"nombre": nombre})
	}else{
		$("#resultado").hide();		
	}

    

});

</script>

