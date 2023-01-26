<?php
/**
*
*/
 class Cursos extends Connection{

    const FIELDS = [
        'id',
        'nombre',
        'enlace',
        'descripcion'
   ]; 

    protected $name;
    protected $link; 
    protected $description;
    protected $idDelete;

    // apertura de metodos SET de class Cursos

    public function setName($name){
        $this->name = $name;
    }
    
    public function setLink($link){
        $this->link = $link;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setIdDelete($idDelete){
        $this->idDelete = $idDelete;
    }

    // apertura de metodos GET de class Cursos

    public function getName(){
        return $this->name;
    }
    
    public function getLink(){
        return $this->link;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getIdDelete(){
        return $this->idDelete;
    }

    // metodo para agregar un curso en la base de datos

    public function addCurso(){
        $name = $this->getName();
        $link = $this->getLink(); 
        $description = $this->getDescription();

        $field = [];
        foreach(self::FIELDS as  $value){
            $field[] = "`".$value."`";
        }

        $fields = implode(", ",$field);
        $sql="INSERT INTO `cursos` ($fields) VALUES (NULL, '$name', '$link', '$description');";
        $this->ejecutar($sql);
        header("location:Cursos.php");
    }

    // metodo para borrar un curso en la base de datos

    public function deleteCurso(){
        $id = $this->getIdDelete();

        $sql="DELETE FROM `cursos` WHERE `cursos`.`id` = ".$id;
        $this->ejecutar($sql);
        header("location:Cursos.php");
    }

    // metodo para obtener todos los curso de la base de datos

    public function allCursos(){
        return $this->consultar("SELECT * FROM `cursos`");
    }
    
 }