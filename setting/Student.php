<?php
/**
*
*/

class Student extends User{

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

    public function deleteStudent(){
        $id = $this->getIdDelete();

        $sql="DELETE FROM `usuarios` WHERE `usuarios`.`id` = ".$id;
        $this->ejecutar($sql);
        header("location:Students.php");
    }

    // metodo para obtener todos los estudiantes de la base de datos

    public function allStudents(){
        return  $this->consultar("SELECT * FROM `usuarios`");
    }

    public function idStudent(){
        $student = $this->consultar("SELECT * FROM `usuarios`");

    }
    
    public function addCurso($idCurso){
        $idStudent = $this->data['id'];
        $cursoVisto = $this->consultarUsuario("SELECT id,id_usuario,id_curso FROM `usuarios_x_curso` 
                                    WHERE id_usuario = $idStudent and id_curso = $idCurso");
        
        if(empty($cursoVisto)){
            $sql = "INSERT INTO `usuarios_x_curso` (`id`, `id_usuario`, `id_curso`) VALUES (NULL, '$idStudent', '$idCurso');";
            $this->consultar($sql);
        }
    }
    
    public function deleteAll(){
        $idStudent = $this->data['id'];
        $sql = " DELETE FROM `usuarios_x_curso` where id_usuario = $idStudent "; 
        $this->consultar($sql);
    }

    public function getCursos(){        
        if($idStudent = $this->data['id']){
            $sql = "SELECT id,id_usuario,id_curso FROM `usuarios_x_curso` ";
            return $this->consultar($sql);
        }
        return [];
    }
}