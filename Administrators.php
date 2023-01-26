<?php
include ('Administratorheader.php'); 
include_once('setting\Administrator.php');

$user = new Administrator();

if($_GET){
    $user->setIdDelete($_GET['borrar']);
    $user->deleteAdministrator();
}

$administrators = $user->allAdministrators();

?>

<br/>
<h2 class="title admin">Administradores.</h2>
<br/>
<?php foreach($administrators as $administrator){?>
    <?php if($administrator['cuenta']=="Administrador"){?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <strong>Administrador:</strong> 
                        <?php 
                        echo $administrator['nombre']." "; 
                        echo $administrator['apellido']; 
                        ?>
                    </h2>
                    <h6 class="card-title"> <strong>ID:</strong>  <?php echo $administrator['id']; ?></h6>
                    <strong>Correo: </strong><span><?php echo $administrator['email']; ?></span><br/>
                    <strong>Direccion: </strong><span><?php echo $administrator['ciudad_municipio']."-"; echo $administrator['diereccion']; ?></span><br/>
                    <strong>Telefon: </strong><a href="tel:<?php echo $administrator['telefono']; ?>"><?php echo $administrator['telefono']; ?></a><br/>
                    <a class="btn btn-danger" href="?borrar=<?php echo $administrator['id']; ?>" role="button">Eliminar</a>
                </div>
            </div>
        </div>
        <br/>
    <?php } ?>
<?php } ?>

<?php include ('Footer.php'); ?>