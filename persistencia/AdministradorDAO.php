<?php
class AdministradorDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    
    function AdministradorDAO ($id, $nombre, $apellido, $correo, $clave){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
    }
    
    function autenticar(){
        return "select idadministrador from administrador
                where correo = '" . $this -> correo . "' and clave = md5('" . $this -> clave . "')";
    }

    function consultar(){
        return "select idadministrador, nombre, apellido, correo from administrador
                where idadministrador = '" . $this -> id . "'";
    }
    
}


?>