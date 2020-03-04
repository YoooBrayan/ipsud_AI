<?php

class MedicoDAO {

    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $cedula;
    private $estado;
    private $telefono;
    private $direccion;
    private $foto;

    function MedicoDAO($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $cedula = "", $estado = "", $telefono = "", $direccion = "",$foto=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->cedula = $cedula;
        $this->estado = $estado;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->foto = $foto;
    }

    function consultar() {
        return "select nombre, apellido, correo 
                from medico
                where idmedico =" . $this -> id;
    }

    function consultarTodos(){
        return "select idpaciente,nombre, apellido, correo, estado,telefono,direccion,foto 
                from paciente
                order by idPaciente";
    }

}

?>