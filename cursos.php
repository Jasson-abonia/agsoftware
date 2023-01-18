<?php include ('cabeceraAdmin.php'); ?>
<?php

if($_POST){
    print_r($_POST);
    $nombre= $_POST['nombre'];
    $enlace= $_POST['enlace'];
    $descripcion= $_POST['descripcion'];

    $objconexion = new conexion();
    $sql="INSERT INTO `cursos` (`id`, `nombre`, `enlace`, `descripcion`) VALUES (NULL, '$nombre', '$enlace', '$descripcion');";
    $objconexion->ejecutar($sql);
    header("location:cursos.php");
}

if($_GET){
    $id=$_GET['borrar'];
    $objconexion = new conexion();
    $sql="DELETE FROM `cursos` WHERE `cursos`.`id` = ".$id;
    $objconexion->ejecutar($sql);
    header("location:cursos.php");
}

$objconexion = new conexion();
$cursos=$objconexion->consultar("SELECT * FROM `cursos`");

?>
<br/>
<h2 class="title curso">Cursos.</h2>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                Datos para agregar un curso
            </div>
                <div class="card-body">
                    <form action="cursos.php" method="post" enctype="multipart/form-data">
                    
                        <label>Nombre del curso:</label>
                        <input required class="form-control" type="text" name="nombre"><br/>
                        <label>Enlace</label>
                        <input required class="form-control" type="text" name="enlace"><br/>
                        <label>Descripcion del curso:</label>
                        <textarea required class="form-control" name="descripcion" id="" cols="30" rows="10"></textarea><br/>

                        <input class="btn btn-success" type="submit" value="Añadir curso">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Enlace</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cursos as $curso){?>
                        <tr class="">
                            <td scope="row"><?php echo $curso['id']; ?></td>
                            <td><?php echo $curso['nombre']; ?></td>
                            <td><a href="<?php echo $curso['enlace']; ?>" target="_blank">ver</a></td>
                            <td><?php echo $curso['descripcion']; ?></td>
                            <td><a class="btn btn-danger" href="?borrar=<?php echo $curso['id']; ?>" role="button">Eliminar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

<?php include ('pie.php'); ?>
