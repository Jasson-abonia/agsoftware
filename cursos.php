<?php 
include ('Administratorheader.php'); 
include_once('setting\Cursos.php');

$curso = new Cursos();

if($_POST){
    $curso->setName($_POST['nombre']);
    $curso->setLink($_POST['enlace']);
    $curso->setDescription($_POST['descripcion']);
    $curso->addCurso();
}

if($_GET){
    $curso->setIdDelete($_GET['borrar']);
    $curso->deleteCurso();
}

$cursos = $curso->allCursos();

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

<?php include ('Footer.php'); ?>
