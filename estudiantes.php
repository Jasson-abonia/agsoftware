<?php include ('cabeceraAdmin.php'); ?>
<?php include ('setting\conexion.php'); ?>

<?php

if($_GET){
    $id=$_GET['borrar'];
    $objconexion = new conexion();
    $sql="DELETE FROM `usuarios` WHERE `usuarios`.`id` = ".$id;
    $objconexion->ejecutar($sql);
    header("location:estudiantes.php");
}

$objconexion = new conexion();
$estudiantes=$objconexion->consultar("SELECT * FROM `usuarios`");

?>

<br/>
<h2 class="title-studen">Estudiantes.</h2>
<br/>
<?php foreach($estudiantes as $estudiante){?>
    <?php if($estudiante['cuenta']=="Estudiante"){?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <strong>Estudiante:</strong> 
                        <?php 
                        echo $estudiante['nombre']." "; 
                        echo $estudiante['apellido']; 
                        ?>
                    </h2>
                    <h6 class="card-title"> <strong>ID:</strong>  <?php echo $estudiante['id']; ?></h6>
                    <strong>Correo: </strong><span><?php echo $estudiante['email']; ?></span><br/>
                    <strong>Direccion: </strong><span><?php echo $estudiante['ciudad_municipio']."-"; echo $estudiante['diereccion']; ?></span><br/>
                    <strong>Telefon: </strong><a href="tel:<?php echo $estudiante['telefono']; ?>"><?php echo $estudiante['telefono']; ?></a><br/>
                    <a class="btn btn-danger" href="?borrar=<?php echo $estudiante['id']; ?>" role="button">Eliminar</a>
                </div>
            </div>
        </div>
        <br/>
    <?php } ?>
<?php } ?>

<style>
    h2.title-studen {
    background: #8eaad3;
    height: 60px;
    margin: 60px auto 20px;
    padding: 10px;
    text-align: center;
    font-weight: 900;
    border-radius: 30px;
}

<?php include ('pie.php'); ?>