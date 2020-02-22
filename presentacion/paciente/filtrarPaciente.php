<?php 

if(isset($_POST['nombre'])){

    $paciente = new Paciente();
    $pacientes = $paciente -> consultarFiltro($_POST['nombre']);
    
    $tabla = "";

    if(count($pacientes)>0){

        $tabla .= "<table class='table table-striped table-hover'>
        <thead>
            <tr>
                <th scope='col'>Id</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Apellido</th>
                <th scope='col'>Correo</th>
                <th scope='col'>Estado</th>
                <th scope='col'>Telefono</th>
                <th scope='col'>Direccion</th>
                <th scope='col'>Servicios</th>
            </tr>
        </thead>
        <tbody id='ids'>";

        foreach($pacientes as $p){
            $tabla .=  "<tr id='". $p -> getId() ."'> 
            <td> " . $p -> getId() ." </td>
            <td> " . $p -> getNombre() ." </td>
            <td> " . $p -> getApellido() ." </td>
            <td> " . $p -> getCorreo() ." </td>
            <td><span id='icon" . $p -> getId() ."' class='fas " . ($p -> getEstado()==0?'fa-times-circle':'fa-check-circle') ." data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($p -> getEstado()==0?'Inhabilitado':'Habilitado') ."'></span></td>
            <td> " . $p -> getTelefono() ." </td>
            <td> " . $p -> getDireccion() ." </td>
            <td id='cambiarEstados'>" . "<a href='modalPaciente.php?idPaciente=" . $p->getId() . "' data-toggle='modal' data-target='#modalPaciente' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
                       <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarPaciente.php") . "&idPaciente=" . $p->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                       <a class='fas fa-camera' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarFotoPaciente.php") . "&idPaciente=" . $p->getId() . "' data-toggle='tooltip' data-placement='left' title='Actualizar Foto'> </a>
                       <div style='color: #007bff;'  id='cambiarEstado" . $p->getId() . "' value='" . $p->getId() . "' class='fas fa-power-off actualizar'  data-toggle='tooltip' data-placement='left' data-original-title='" . ($p->getEstado() == 1 ? "Inhabilitar" : "Habilitar") . "'> </div>
              </td>
            </tr>";
        }

        $tabla .= "</tbody></table>";
    }else{
        $tabla = "No se encontraron registros.";
    }

    echo $tabla;
    

}
?>
<script type="text/javascript">
$(function () {
	  $("[data-toggle='tooltip']").tooltip();
}); 
</script>


<script type="text/javascript">
	$("table").on("click", "#ids .actualizar", function(event) {
		var elemento = $(this)[0].parentElement.parentElement;
		//event.preventDefault();
		id = $(this).attr("value");
		actEstado(id);
	})


	function actEstado(idS) {
		$.ajax({
			url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/paciente/editarEstadoPacienteAjax.php") ?>",
			type: "POST",
			data: {
				id: idS
			},
			success: function(response) {

				/*Swal.fire({
					position: "top-end",
					icon: "success",
					title: "Estado Actualizado",
					showConfirmButton: "false",
					timer: "500"
				});*/
				let datos = JSON.parse(response);
				$("#icon" + idS).removeClass();
				$("#icon" + idS).addClass(datos['icon']);
				$("#icon" + idS).attr('data-original-title', datos['tooltip']);
				$("#cambiarEstado" + idS).attr('data-original-title', datos['tooltip2']);
				$("#cambiarEstado" + idS).tooltip('hide');
				$("#cambiarEstado" + idS).tooltip('show');
			}
		})
	}
</script>
