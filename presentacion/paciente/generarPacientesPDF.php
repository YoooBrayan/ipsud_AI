<?php
$pdf = new Cezpdf();
$pdf->selectFont('pdf/fonts/Helvetica.afm');
$pdf->ezText('Hello World', 51);

$pdf->selectFont('pdf/fonts/Helvetica.afm');
$data = array( 
    array('numero'=>1,'name'=>'gandalf','type'=>'wizard'),
    array('numero'=>2,'name'=>'bilbo','type'=>'hobbit','url'=>'http://www.ros.co.nz/pdf/'),
    array('numero'=>3,'name'=>'frodo','type'=>'hobbit'),
    array('numero'=>4,'name'=>'saruman','type'=>'baddude','url'=>'http://sourceforge.net/projects/pdf-php'),
    array('numero'=>5,'name'=>'sauron','type'=>'really bad dude'));
    $pdf->ezTable($data);

$pdf->ezStream();
?>