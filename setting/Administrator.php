<?php
/**
*
*/

class Administrator extends Connection{

    protected $idDelete;

    // apertura de metodos SET de class Student

    public function setIdDelete($idDelete){
        $this->idDelete = $idDelete;
    }

    // apertura de metodos GET de class Student

    public function getIdDelete(){
        return $this->idDelete;
    }
    
    // metodo para borrar un estudiantes en la base de datos

    public function deleteAdministrator(){
        $id = $this->getIdDelete();

        $sql="DELETE FROM `usuarios` WHERE `usuarios`.`id` = ".$id;
        $this->ejecutar($sql);
        header("location:Administrators.php");
    }

    // metodo para obtener todos los estudiantes de la base de datos

    public function allAdministrators(){
        return  $this->consultar("SELECT * FROM `usuarios`");
    }
}