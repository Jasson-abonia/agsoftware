<?php include ('conexion.php'); ?>

<?php

$tipoCuenta="";

if($_POST){
    $cuenta= $_POST['cuenta'];
    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $fecha_nacimiento= $_POST['fecha_nacimiento'];
    $telefono= $_POST['telefono'];
    $departamento= $_POST['departamento'];
    $ciudad_municipio= $_POST['ciudad_municipio'];
    $direccion= $_POST['direccion'];
    $email= $_POST['email'];
    $contrasenia1= password_hash( $_POST['contrasenia1'], PASSWORD_BCRYPT);
    $contrasenia2= password_hash( $_POST['contrasenia2'], PASSWORD_BCRYPT);

    $objconexion = new conexion();

    $sqlUsuario="INSERT INTO `usuarios` (`id`, `cuenta`, `nombre`, `apellido`, `fecha_nacimiento`, `telefono`, `departamento`, `ciudad_municipio`, `diereccion`, `email`, `contrasenia`) 
                 VALUES (NULL, '$cuenta', '$nombre', '$apellido', '$fecha_nacimiento', '$telefono', '$departamento', '$ciudad_municipio', '$direccion', '$email', '$contrasenia2');";
   
    $objconexion->ejecutar($sqlUsuario);

    if($cuenta == "Estudiante"){
        
        header("location:success.php");

    }else{
        
        echo "<script> alert('Debes es perar que se confirme tu solisitud para ser administrador, se confirmara al correo '.$email.' la respuesta.')</script>";
        header("location:success.php");
    }

}

?>