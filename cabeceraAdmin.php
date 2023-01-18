
<?php

// session_start();
// if( isset($_SESSION['usuario'])!=$usuario){
//     header("location:login.php");
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Cursos</title>
</head>
<body>
    <style>
        .header {
            display: flex;
            background: #5b9af5;
            height: 60px;
            align-items: center;
            width: 100%;
            position: fixed;
            justify-content: space-evenly;
            left: 0;
            padding: 0 18%;
        }

        .header a {
            padding: 0 20px;
            font-size: 20px;
            color: white;
            text-decoration: none;
        }

        .header a:hover { 
            text-align: center;
            color: #dc3545;
            background: #a0bfec21;
            border-radius: 50%;
            font-size: 20.1px;
            width: 20%;
            height: 86%;
            padding: 6px;
        }
    </style>
    <div class="container">
        <div class="header">
            <a href="admin.php">Inicio</a>|
            <a href="estudiantes.php">estudiantes</a>|
            <a href="administradores.php">administradores</a>|
            <a href="cursos.php">cursos</a>|
            <a href="setting/cerrar.php">Cerrar</a>
        </div>
    
    