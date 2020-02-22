<?php 

if(isset($_POST['nombre'])){

    $paciente = new Paciente();
    $pacientes = $paciente -> consultarFiltro($_POST['nombre']);
    
    $json = array();

    foreach($pacientes as $p){

        $json[] = array(
            "id" => $p -> getId(),
            "nombre" => $p -> getNombre(),
            "apellido" => $p -> getApellido(),
            "correo" => $p -> getCorreo(),
            "estado" => ($p -> getEstado()==0?"fas fa-times-circle":"fas fa-check-circle"),
            "tooltip1" => ($p -> getEstado()==0?"Deshabilitado":"Habilitado"),
            "tooltip2" => ($p -> getEstado()==0?"Habilitar":"Deshabilitar"),
            "telefono" => $p -> getTelefono(),
            "direcciom" => $p -> getDireccion()
        );
    }

    $datos = json_encode($json);

    echo $datos;

}
?>