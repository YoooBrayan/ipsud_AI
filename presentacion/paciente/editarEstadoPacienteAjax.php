<?php
if (isset($_POST['id'])) {

	$paciente = new Paciente($_POST['id'], "", "", "", "", "", "");
	$paciente->consultar();
	$pacienteA = new Paciente($_POST['id'], "", "", "", "", "", (($paciente->getEstado()) == 0 ? 1 : 0));
	$pacienteA->actualizarEstado();

	$json = array(
		'icon' => $pacienteA->getEstado() == 0 ? "fas fa-times-circle" : "fas fa-check-circle",
		'tooltip' => $pacienteA->getEstado() == 0 ? "Inhabilitado" : "Habilitado",
		'tooltip2' => $pacienteA->getEstado() == 1 ? "Inhabilitar" : "Habilitar",
	);
	echo json_encode($json);
}
