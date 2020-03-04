<?php

class CitaDAO {

    private $id;
    private $fecha;
    private $hora;
    private $medico;
    private $paciente;
    private $consultorio;
    
    function CitaDAO($id = "", $fecha = "", $hora = ""){
        $this->id = $id;
        $this->fecha = $fecha;
        $this->medico = new Medico();
        $this->paciente = new Paciente();
        $this->consultorio = new Consultorio();
    }

    function consultar($paciente) {
        return "SELECT  ci.idcita as 'ID Cita', concat_ws(' ', m.nombre, m.apellido) as 'Doctor', c.nombre as 'Consultorio', fecha, hora FROM
        paciente p inner join cita ci on p.idpaciente = ci.paciente_idpaciente inner JOIN medico m on m.idmedico = ci.medico_idmedico INNER JOIN consultorio c on c.idconsultorio = ci.consultorio_idconsultorio where p.idPaciente = " . $paciente ." order by ci.idcita;
";
    }

    function consultarTodos(){
        return "select idpaciente,nombre, apellido, correo, estado,telefono,direccion,foto 
                from paciente
                order by idPaciente";
    }

}

?>