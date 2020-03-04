<?php
require 'persistencia/PacienteDAO.php';
require_once 'persistencia/Conexion.php';

class Paciente extends Persona {
    private $cedula;
    private $estado;
    private $telefono;
    private $direccion;
    private $foto;
    private $pacienteDAO;
    private $conexion;
    
    function getEstado(){
        return $this -> estado;
    }
    function setEstado($pEstado){
        $this -> estado = $pEstado;
    }
	function setId($pId){
        $this -> id = $pId;
    }
    
    function getCedula(){
        return $this -> cedula;
    }
    function getTelefono(){
        return $this -> telefono;
    }
    function getDireccion(){
        return $this -> direccion;
    }
    function getFoto(){
        return $this -> foto;
    }

    function setNombre($nombre){
        $this -> nombre = $nombre;
    }   
    
    function Paciente ($id="", $nombre="", $apellido="", $correo="", $clave="", $cedula="", $estado="",$telefono="", $direccion="",$foto=""){ 
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> cedula = $cedula;
        $this -> estado = $estado;
        $this -> telefono = $telefono;
        $this -> direccion = $direccion;
        $this -> foto = $foto;
        $this -> conexion = new Conexion();
        $this -> pacienteDAO = new PacienteDAO($id, $nombre, $apellido, $correo, $clave, $cedula, $estado,$telefono,$direccion,$foto);        
    }
    
    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO -> registrar());
        $this -> conexion -> cerrar();
    }
    
    function actualizar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO ->actualizar());
        $this -> conexion -> cerrar();
    }
    
    function actualizarFoto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO ->actualizarFoto());
        $this -> conexion -> cerrar();
    }

    function actualizarEstado(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO ->actualizarEstado());
        $this -> conexion -> cerrar();
    }
    
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 0){
            $this -> conexion -> cerrar();
            return false;
        } else {
            $this -> conexion -> cerrar();
            return true;            
        }
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> apellido = $resultado[1];
        $this -> correo = $resultado[2];
        $this -> cedula = $resultado[3];
        $this -> telefono = $resultado[4];
        $this -> direccion = $resultado[5];
        $this -> foto = $resultado[6];
        $this -> estado = $resultado[7];
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Paciente($registro[0], $registro[1], $registro[2], $registro[3], "", "", $registro[4],$registro[5],$registro[6],$registro[7]);
            $i++;
        }        
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
    function consultarFoto(){
    	$this -> conexion -> abrir();
    	$this -> conexion -> ejecutar($this -> pacienteDAO -> consultarFoto());
    	$resultado = $this -> conexion -> extraer();
    	$this -> foto = $resultado[0];
    	$this -> conexion -> cerrar();
    	
    }

    function consultarFiltro($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO -> consultarFiltro($filtro));
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Paciente($registro[0], $registro[1], $registro[2], $registro[3], "", "", $registro[4],$registro[5],$registro[6],$registro[7]);
            $i++;
        }        
        $this -> conexion -> cerrar();
        return $resultados;
    }

    function consultarPacientesCitas(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> pacienteDAO -> consultarPacientesCitas());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Paciente($registro[0], $registro[1]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }
    
}