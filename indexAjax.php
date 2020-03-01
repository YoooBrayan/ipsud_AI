	
<?php
require 'logica/Persona.php';
require 'logica/Administrador.php';
require 'logica/Paciente.php';

session_start();

if (isset($_GET["pid"]) && $_SESSION["id"]!="") {

	$pid = base64_decode($_GET["pid"]);
	include $pid;
}else{
	header("Location: index.php");
}

?>