<?php 
include ('Connection.php');
include_once('User.php');

$validationUser = new User();


if($_POST){
    $validationUser->setSessionStart($_POST['email_usuario']);
    $validationUser->validationLogin($_POST['password']);
}

?>