<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$paciente = new Paciente($_GET["idPaciente"]);
$paciente->consultar();
if (isset($_POST["actualizar"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $paciente = new Paciente($_GET["idPaciente"], $nombre, $apellido, "", "", $cedula, "", $telefono, $direccion);
    $paciente->actualizar();
}
include 'presentacion/menuAdministrador.php';
?>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-primary text-white">Actualizar Paciente</div>
				<div class="card-body">
						<?php
    if (isset($_POST["actualizar"])) {
        ?>
						<div class="alert alert-success" role="alert">Paciente actualizado
						exitosamente.</div>						
						<?php } ?>
						<form
						action=<?php echo "index.php?pid=" . base64_encode("presentacion/paciente/actualizarPaciente.php")."&idPaciente=".$_GET["idPaciente"] ?>
						method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control"
								placeholder="Nombre" required="required"
								value="<?php echo $paciente->getNombre(); ?>">
						</div>
						<div class="form-group">
							<input type="text" name="apellido" class="form-control"
								placeholder="apellido" required="required"
								value="<?php echo $paciente->getApellido(); ?>">
						</div>
						<div class="form-group">
							<input type="text" name="cedula" class="form-control"
								placeholder="Cedula" required="required"
								value="<?php echo $paciente->getcedula(); ?>">
						</div>
						<div class="form-group">
							<input type="text" name="telefono" class="form-control"
								placeholder="Telefono" required="required"
								value="<?php echo $paciente->getTelefono(); ?>">
						</div>
						<div class="form-group">
							<input type="text" name="direccion" class="form-control"
								placeholder="Direccion" required="required"
								value="<?php echo $paciente->getDireccion(); ?>">
						</div>
						<button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>