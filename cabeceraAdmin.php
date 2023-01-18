
<?php include ('setting\conexion.php'); ?>
<?php include ('setting\session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css\styles.css">
    <title>Cursos</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="admin.php">Inicio</a>|
            <a href="estudiantes.php">estudiantes</a>|
            <a href="administradores.php">administradores</a>|
            <a href="cursos.php">cursos</a>|
            <a href="cerrar.php">Cerrar</a>|
            <?php if(!empty($nombre)){ ?>
                <div>
                <img class="icon-user" src="imagenes\icono-usuario-blue.png" title="<?php echo $nombre; ?>" alt="incono-usuario"> <strong class="name-user"><?php echo $nombre; ?></strong>
                </div>
            <?php } ?>
        </div>
    
    