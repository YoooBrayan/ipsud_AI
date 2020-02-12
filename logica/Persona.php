<?php
class Persona {
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $correo;
    protected $clave;
    
    function getId(){
        return $this -> id;
    }

    function getNombre(){
        return $this -> nombre;
    }
    
    function getApellido(){
        return $this -> apellido;
    }
    
    function getCorreo(){
        return $this -> correo;
    }
    function getClave(){
        return $this -> clave;
    }
    
    
    function Persona ($id, $nombre, $apellido, $correo, $clave){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;        
    }    
}

?>