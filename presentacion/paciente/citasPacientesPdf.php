<?php

$paciente = new Paciente();
$pacientes = $paciente -> consultarPacientesCitas();

$cita = new Cita();

$pdf = new Cezpdf();
$pdf->selectFont('pdf/fonts/Helvetica.afm');

$options = array(
    'aleft' => 205
);

$optionsP = array(
    'aleft' => 70
);

$titles = array("ID Cita", "Doctor", "Consultorio", "Fecha", "Hora");

$optionsT = array(
    'fontSize' => 13
);

$pdf->ezText("Lista de Citas\n", 30, $options);

$i=0;
foreach($pacientes as $p){

    $pdf->ezText("<b>Agenda del Paciente:<b>\n", 17, $optionsP);
    $dataPaciente = "ID: " . $p -> getId() . "\nNombre: " . $p -> getNombre() . "\n";

    $pdf->ezText($dataPaciente, 15, $optionsP);

    $citas = $cita -> consultarCitasPaciente($p -> getId());

    foreach($citas as $c){
        $data[] = array(
            'ID Cita'=> $c -> getId(),
            'Medico'=> $c -> getMedico() -> getNombre(),
            'Consultorio'=> $c -> getConsultorio() -> getId(),
            'Fecha'=> $c -> getFecha(),
            'Hora'=> $c -> getHora()
            );
    }
    $pdf->ezTable($data, null, null, $optionsT);    
    unset($data);
    $i++;

    ($i==count($pacientes)?null:$pdf -> ezNewPage());
    //$pdf -> ezNewPage();
}


$pdf -> ezText("\n\n\nEl presente certificado se expide por solicitud del interesado a los " . date("j ")  ."dias del mes ". date("m") ." del " . date("Y"), 13, array('left' => 50));

$pdf->ezStream();
?>

