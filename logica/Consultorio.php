<?php
require 'persistencia/ConsultorioDAO.php';
require_once 'persistencia/Conexion.php';

class Consultorio {
    private $id;
    private $nombre;
    private $consultorioDAO;
    private $conexion;
    
    function Medico ($id="", $nombre=""){ 
        $this -> conexion = new Conexion();
        $this -> consultorioDAO = new ConsultorioDAO($id, $nombre);        
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> consultorioDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> id = $resultado[0];
        $this -> nombre = $resultado[0];
        $this -> conexion -> cerrar();
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }


}