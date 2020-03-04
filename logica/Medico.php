<?php
require 'persistencia/MedicoDAO.php';
require_once 'persistencia/Conexion.php';

class Medico extends Persona {
    private $cedula;
    private $estado;
    private $telefono;
    private $direccion;
    private $foto;
    private $medicoDAO;
    private $conexion;
    
    function Medico ($id="", $nombre="", $apellido="", $correo="", $clave=""){ 
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> conexion = new Conexion();
        $this -> medicoDAO = new MedicoDAO($id, $nombre, $apellido, $correo, $clave);        
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> medicoDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> correo = $resultado[2];
        $this -> conexion -> cerrar();
    }

    function setNombre($nombre){
        $this -> nombre = $nombre;
    }   

}