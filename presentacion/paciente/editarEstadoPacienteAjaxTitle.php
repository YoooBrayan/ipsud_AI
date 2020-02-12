<?php
 
$paciente = new Paciente($_GET['idPaciente'], "", "", "", "", "", $_GET['estado']);
echo "<script>
console.log('EstadoArrived ' ," . $paciente -> getEstado() .");
</script>";
$paciente->actualizarEstado();

echo "<a id='cambiarEstado" . $paciente->getId() . "' class='fas fa-award' href='#' data-toggle='tooltip' data-placement='left' title='" . ($paciente->getEstado()==0?"Habilitar":"Inhabilitar") . "'> </a>";


?>

