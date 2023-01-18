<?php include ('cabecera.php'); ?>
<?php include ('setting\conexion.php'); ?>

<?php 

$curso_visto="";

if($_POST){

    $curso_visto= (isset($_POST['curso_visto'])=="si")?"checked":"";

}

$objconexion = new conexion();
$cursos=$objconexion->consultar("SELECT * FROM `cursos`");

?>
     <br/>
    <div class="row align-items-md-stretch">
        <div class="col-md-8">
            <div class="h-100 p-5 text-white bg-primary border rounded-3">
                <h2>Bienvenidos</h2>
                <p>Este es mi portafolio privado</p>
                <button class="btn btn-outline-primary" type="button">Mas informacion</button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="h-100 p-5 text-white bg-primary border rounded-3">
                <h5>Porcentaje actual de cursos vistos</h5>
                <h2>
                    <strong>
                        80%
                    </strong>
                </h2> 
            </div>
        </div>
        <br/>
        <br/>
        <form action="" method="post">
            <br/>
            <?php foreach($cursos as $curso){?>
                <div class="col">
                    <div class="card">
                        
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $curso['nombre']; ?></h5>
                                <h6 class="card-title">ID: <?php echo $curso['id']; ?></h6>
                                <p class="card-text"><?php echo $curso['descripcion']; ?></p>
                                <strong>
                                    <a href="<?php echo $curso['enlace']; ?>" target="_blank">Ver curso</a>
                                </strong>
                                <p>marcar como visto<input type="checkbox" <?php echo $curso_visto;?> name="curso_visto" value="si"></p>
                            </div>
                    </div>
                </div>
                <br/>
            <?php } ?>
        <input class="btn btn-success" type="submit" value="Actualizar cursos vistos">
        </form>
    </div>

<?php include ('pie.php'); ?>