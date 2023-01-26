<?php

class Connection{

    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $Connection;

    public function __construct(){
        try{
            $this->Connection = new PDO("mysql:host=$this->servidor; dbname=agsoftware", $this->usuario, $this->contrasenia );
            $this->Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
           return "falla de conexion".$e;
        }
    }

    public function ejecutar($sql){ //insertar/delete/actualizar

        $this->Connection->exec($sql);
        return $this->Connection->lastInsertId();
    }

    public function consultar($sql){

        $sentencia=$this->Connection->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    public function consultarUsuario($sql){

        $sentencia=$this->Connection->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    }

}

?>