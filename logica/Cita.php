<?php
require 'persistencia/CitaDAO.php';
require_once 'persistencia/Conexion.php';

class Cita {

    private $id;
    private $fecha;
    private $hora;
    private $medico;
    private $paciente;
    private $consultorio;
    private $citaDAO;
    private $conexion;
    
    function Cita($id = "", $fecha = "", $hora = ""){
        $this->id = $id;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->medico = new Medico();
        $this->paciente = new Paciente();
        $this->consultorio = new Consultorio();
        $this->conexion = new Conexion();
        $this->citaDAO = new CitaDAO($id, $fecha, $hora);
    }

    function consultarCitasPaciente($paciente){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> citaDAO -> consultar($paciente));
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Cita($registro[0], $registro[3], $registro[4]);
            $resultados[$i] -> getMedico() -> setNombre($registro[1]);
            $resultados[$i] -> getConsultorio() -> setId($registro[2]);
            $i++;
        }        
        $this -> conexion -> cerrar();
        return $resultados;
    }
    

    function getpaciente(){
        return $this->paciente;
    }

    function getMedico(){
        return $this->medico;
    }

    function getConsultorio(){
        return $this->consultorio;
    }

    function getId(){
        return $this->id;
    }

    function getFecha(){
        return $this->fecha;
    }

    function getHora(){
        return $this->hora;
    }


}