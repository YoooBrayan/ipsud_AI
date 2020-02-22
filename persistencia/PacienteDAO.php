<?php

class PacienteDAO {

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

    function PacienteDAO($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $cedula = "", $estado = "", $telefono = "", $direccion = "",$foto=""){
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

    function registrar(){
        return "insert into paciente 
                (nombre, apellido, correo, clave, cedula, estado)
                values ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', md5('" . $this->clave . "'), '" . $this->cedula . "', '" . $this->estado . "')";
    }

    function actualizar(){
        return "update paciente set 
                nombre = '" . $this -> nombre . "',
                apellido='" . $this -> apellido . "', 
                cedula ='" . $this -> cedula . "',
                telefono='" . $this -> telefono . "',
                direccion='" . $this -> direccion . "' 
                where idpaciente=" . $this -> id;
    }
    
    function actualizarFoto(){
        return "update paciente set
                foto = '" . $this -> foto . "'
                where idpaciente=" . $this -> id;
    }

    function actualizarEstado(){
        return "update paciente set
                estado = '" . $this -> estado . "'
                where idpaciente=" . $this -> id;
    }
    
    function consultar() {
        return "select nombre, apellido, correo, cedula, telefono, direccion,foto,estado 
                from paciente
                where idpaciente =" . $this -> id;
    }

    function consultarFoto(){
    	return "select foto from paciente where idpaciente =" . $this -> id;
    }

    function existeCorreo(){
        return "select idpaciente from paciente
                where correo = '" . $this->correo . "'";
    }

    function consultarTodos(){
        return "select idpaciente,nombre, apellido, correo, estado,telefono,direccion,foto 
                from paciente
                order by apellido";
    }

    function consultarFiltro($filtro){
        return "select idpaciente,nombre, apellido, correo, estado,telefono,direccion,foto 
        from paciente where nombre like '%". $filtro ."%' limit 8";
    }
}

?>