<?php

$paciente = new Paciente();
$pacientes = $paciente -> consultarTodos();

$pdf = new Cezpdf();
$pdf->selectFont('pdf/fonts/Helvetica.afm');

$options = array(
    'aleft' => 170
);

$pdf->ezText("Lista de Pacientes\n", 30, $options);

$pdf->selectFont('pdf/fonts/Helvetica.afm');

foreach($pacientes as $p){
    $data[] = array(
        'ID'=> $p -> getId(),
        'Nombre'=> $p -> getNombre(),
        'Apellido'=> $p -> getApellido(),
        'Correo'=> $p -> getCorreo(),
        'Estado'=> ($p -> getEstado()==0?'Inhabilitado':'Habilitado'),
        'Telefono'=> $p -> getTelefono(),
        'Direccion'=> $p -> getDireccion()
        );
}

$pdf->ezTable($data);

$pdf -> ezText("\n\nEl presente certificado se expide por solicitud del interesado a los " . date("j ")  ."dias del mes ". date("m") ." del " . date("Y"), 13, array('left' => 50));

$pdf->ezStream();
?>


<script>
document.title = "PacientesPDF";
</script>