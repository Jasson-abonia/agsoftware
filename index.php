<?php 
include ('Headboard.php');
include_once('setting\Cursos.php');
include_once('setting\Student.php');

$cursos = new Cursos();
$validationSessionStart = new Student();
$validationSessionStart->setSessionStart($_SESSION['usuario']);

if(isset($_POST['curso_visto']) && is_array($_POST['curso_visto'])){
    $validationSessionStart->deleteAll();
     
    foreach($_POST['curso_visto'] as $curso){
        $cursosVistos[$curso]  = true;
        $idCursosVistos = [];
        $validationSessionStart->addCurso($curso); 
    }
    $namberCursosVistos = sizeof($_POST['curso_visto']);
}else{    
    $validationSessionStart->deleteAll();
    $namberCursosVistos = sizeof($validationSessionStart->getCursos());
}

$cursos = $cursos->allCursos();
$cursosVistos = [];
$totalCurso = sizeof($cursos);
$idCurso = [];

foreach($validationSessionStart->getCursos() as $curso){
    $cursosVistos[$curso['id_curso']]  = true;
}

foreach($cursos as $curso){
    array_push($idCurso, $curso["id"]);
}

?>

<br/>
<div class="row align-items-md-stretch">
    <div class="col-md-8">
        <div class="h-100 p-5 text-white bg-primary border rounded-3">
            <h2>Bienvenido</h2>
            <strong><?= $validationSessionStart->getFullName() ?></strong>
            <button class="btn btn-outline-primary" type="button">Mas informacion</button>
        </div>
    </div>
    <div class="col-md-4">
        <div class="h-100 p-5 text-white bg-primary border rounded-3">
            <h5>Porcentaje actual de cursos vistos</h5>
            <h2>
                <strong>
                <?php echo $namberCursosVistos / $totalCurso * 100 ."%" ?>
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
                            <br/>
                            <strong class="curso-visto">Curso visto<input type="checkbox" <?php echo isset($cursosVistos[$curso['id']])?'checked':" ";?> name="curso_visto[]" value="<?=$curso['id']?>"></strong>
                        </div>
                </div>
            </div>
            <br/>
        <?php } ?>
    <input class="btn btn-success" type="submit" value="Actualizar cursos vistos">
    </form>
</div>

<?php include ('Footer.php'); ?>