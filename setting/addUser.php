<?php

include ('Connection.php');
include_once('User.php');

$addUser = new User();

if($_POST){

    $addUser->setAccount($_POST['cuenta']);
    $addUser->setFirtName($_POST['nombre']);
    $addUser->setLastName($_POST['apellido']);
    $addUser->setDateBirth($_POST['fecha_nacimiento']);
    $addUser->setPhone($_POST['telefono']);
    $addUser->setDepartment($_POST['departamento']);
    $addUser->setCityMunicipality($_POST['ciudad_municipio']);
    $addUser->setDirection($_POST['direccion']);
    $addUser->setEmail($_POST['email']);
    $addUser->setPassword(password_hash( $_POST['password'], PASSWORD_BCRYPT));
    $addUser->setPassword2(password_hash( $_POST['password2'], PASSWORD_BCRYPT));

    $addUser->save();
}

?>