<?php

class ConsultorioDAO {

    private $id;
    private $nombre;
    
    function ConsultorioDAO($id = "", $nombre = ""){
        $this->id = $id;
        $this->nombre = $nombre;
    }

    function consultar() {
        return "select id, nombre 
                from consultorio
                where idconsultorio =" . $this -> id;
    }

    function consultarTodos(){
        return "select idpaciente,nombre, apellido, correo, estado,telefono,direccion,foto 
                from paciente
                order by idPaciente";
    }

}

?>