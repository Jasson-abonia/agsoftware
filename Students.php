<?php 
include ('Administratorheader.php'); 
include_once('setting\Student.php');

$user = new Student();

if($_GET){
    $user->setIdDelete($_GET['borrar']);
    $user->deleteStudent();
}

$students = $user->allStudents();

?>

<br/>
<h2 class="title studen">Estudiantes.</h2>
<br/>
<?php foreach($students as $student){?>
    <?php if($student['cuenta']=="Estudiante"){?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        <strong>Estudiante:</strong> 
                        <?php 
                        echo $student['nombre']." "; 
                        echo $student['apellido']; 
                        ?>
                    </h2>
                    <h6 class="card-title"> <strong>ID:</strong>  <?php echo $student['id']; ?></h6>
                    <strong>Correo: </strong><span><?php echo $student['email']; ?></span><br/>
                    <strong>Direccion: </strong><span><?php echo $student['ciudad_municipio']."-"; echo $student['diereccion']; ?></span><br/>
                    <strong>Telefon: </strong><a href="tel:<?php echo $student['telefono']; ?>"><?php echo $student['telefono']; ?></a><br/>
                    <a class="btn btn-danger" href="?borrar=<?php echo $student['id']; ?>" role="button">Eliminar</a>
                </div>
            </div>
        </div>
        <br/>
    <?php } ?>
<?php } ?>

<?php include ('Footer.php'); ?>