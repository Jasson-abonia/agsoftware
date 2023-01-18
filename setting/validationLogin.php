<?php include ('conexion.php'); ?>

<?php
session_start();

if($_POST){
    $usuario = $_POST['email_usuario'];
    $conreasenia = $_POST['contrasenia'];

    $objconexion = new conexion();
    $usuarios=$objconexion->consultarUsuario("SELECT id, cuenta, nombre, apellido, fecha_nacimiento, telefono, departamento, ciudad_municipio, diereccion, email, contrasenia FROM usuarios WHERE email='$usuario'");

    if(count($usuarios) > 0 && password_verify($conreasenia,  $usuarios['contrasenia']) && $usuarios['cuenta'] == "Administrador"){

        $_SESSION['usuario']=$usuario;
        header("location:admin.php");

    }elseif(count($usuarios) > 0 && password_verify($conreasenia,  $usuarios['contrasenia'])){

        $_SESSION['usuario']=$usuario;
        header("location:index.php");

    }else{
        echo "<script> alert('Usuario o contraseña incorrecta')</script>";
    }

}

?>