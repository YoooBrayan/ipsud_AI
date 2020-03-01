<?php
//$nombre = $_FILES['foto']['name'];
//$tamaño = $_FILES['foto']['size'];
//$tipo = $_FILES['foto']['type'];

$foto = $_FILES['foto'];
$id = $_POST['idPaciente'];

if($foto["size"] <= 1000000)
{
    if($foto["type"]  == "image/jpg" or $foto["type"]  == "image/png" or $foto["type"]  == "image/jpeg" /*strpos($tipo, "jpg") || strpos($tipo, "jpeg") || strpos($tipo, "png")*/)
    {
        $paciente = new Paciente($id);
        $paciente -> consultarFoto();
        
        
        if(is_file("fotos/".$paciente -> getFoto()) && $paciente -> getFoto()!="default.png")
        {
            unlink("fotos/".$paciente -> getFoto());	
        }	
         
        //$tipoI = explode('/', $tipo); //separar cadena cuado encuentre un /. Metodo para obtener tipo de imagen

        $destino = $_SERVER['DOCUMENT_ROOT'] . '/ipsud_Ajax/fotos/';
        move_uploaded_file($foto['tmp_name'], $destino . date("jnYhis") . '.jpg');
         // Se envia al servidor con el nombre modificada en el idPaciente y el tipo de imagen

        $paciente = new Paciente($id, "", "", "", "", "", "", "", "", date("jnYhis") . '.jpg');
        $paciente -> actualizarFoto();
        $json = array(
            'mensaje' => 'Foto del paciente actualizada exitosamente.',
            'alert' => 'alert alert-success'
        );
        echo json_encode($json);
        //echo "<div class='alert alert-success' role='alert'> Foto del paciente actualizada exitosamente. </div>";
    }else{
        $json = array(
            'mensaje' => 'Formato Invalido',
            'alert' => 'alert alert-danger'
        );

        echo json_encode($json);
      //echo "<div class='alert alert-danger' role='alert'> Formato Invalido. </div>";
        ?>
        <?php
        $bandera = false;
    }
}else{

    $json = array(
        'mensaje' => 'Tama&ntildeo de imagen invalido.',
        'alert' => 'alert alert-danger'
    );
    echo json_encode($json);
    //echo "<div class='alert alert-danger' role='alert'> Tama&ntildeo de imagen Invalido. </div>";
    //<div class="alert alert-danger" role="alert">Tama&ntildeo de imagen Invalido.</div> -->
}

?>