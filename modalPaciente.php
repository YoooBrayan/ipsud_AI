<?php
require_once 'logica/Persona.php';
require_once 'logica/Paciente.php';

$idPaciente = $_GET['idPaciente'];
$paciente = new Paciente($idPaciente);
$paciente->consultar();

?>
<div class="modal-header">
	<h5 class="modal-title">Detalles Paciente</h5>
	<button type="button" class="close" data-dismiss="modal"
		aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tbody>
			<tr><th width="20%">Nombre</th><td><?php echo $paciente -> getNombre(); ?></td></tr>		
			<tr><th width="20%">Apellido</th><td><?php echo $paciente -> getApellido(); ?></td></tr>		
			<tr><th width="20%">Foto</th><td heigth="300px"><img src="/IPSUD_Ajax/fotos/<?php echo $paciente -> getFoto(); ?>" /></td></tr>		
		</tbody>
	</table>
</div>