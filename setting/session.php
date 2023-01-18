<?php
session_start();
$usuarioSesion = $_SESSION['usuario'];

if(!empty($usuarioSesion)){
    $objconexion = new conexion();
    $usuarios=$objconexion->consultarUsuario("SELECT id, cuenta, nombre, apellido, fecha_nacimiento, telefono, departamento, ciudad_municipio, diereccion, email, contrasenia FROM usuarios WHERE email='$usuarioSesion'");
    
    $nombre = $usuarios['nombre'];
    $apellido = $usuarios['apellido'];
    $email = $usuarios['email'];

    if( isset($_SESSION['usuario'])!=$email){
        header("location:login.php");
    }
}else{
    header("location:login.php");
}

?>