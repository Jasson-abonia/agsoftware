<?php

class conexion{

    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $conexion;

    public function __construct(){
        try{
            $this->conexion = new PDO("mysql:host=$this->servidor; dbname=agsoftware", $this->usuario, $this->contrasenia );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
           return "falla de conexion".$e;
        }
    }

    public function ejecutar($sql){ //insertar/delete/actualizar

        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function consultar($sql){

        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function consultarUsuario($sql){

        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    }

}

?>