<?php 
include ('setting\Connection.php'); 
include_once('setting\User.php'); 

session_start();
$validationSessionStart = new User();
$validationSessionStart->setSessionStart($_SESSION['usuario']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css\styles.css">
    <script src="js\validationPassword.js"></script>
    <title>Cursos</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="Index.php">Inicio</a>|
            <a href="Exis.php">Cerrar</a>|
            <?php if(!empty($validationSessionStart->getFirtName())){ ?>
                <div>
                   <img class="icon-user" src="imagenes\icono-usuario-blue.png" title="<?= $validationSessionStart->getFirtName(); ?>" alt="incono-usuario"> <strong class="name-user"><?= $validationSessionStart->getFirtName(); ?></strong>
                </div>
            <?php } ?>
        </div>
        <br/>
    
    