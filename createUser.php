<?php include ('setting\addUser.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="js\validationPassword.js"></script>
    <link rel="stylesheet" href="css\styles.css">
    <title>Cursos</title>
</head>
<div class="main-form">
    <div class="content-create-user-div">
        <div class="content-login">
            <br/>
            <br/>
            <h5>Si ya tienes una cuenta pudes iniciar sesión.</h5>
            <a class="btn btn-success" href="login.php">Iniciar sesion</a>
        </div>
        <div class="content-form">
            <form class="formulario" action="createUser.php" method="post" id="formulario">
                <h3>Tipo de cuenta.</h3>
                <select required class="form-control" name="cuenta">
                    <option value=""></option>
                    <option value="Estudiante" <?php echo ($tipoCuenta=="Estudiante")?"selected":""?>>Estudiante</option>
                    <option value="Administrador" <?php echo ($tipoCuenta=="Administrador")?"selected":""?>>Administrador</option>
                </select>
                <br/>
                <h3>Más Información.</h3>
                <label>Nombre:</label>
                <input required  class="form-control" type="text" name="nombre">
                <label>Apellido:</label>
                <input required  class="form-control" type="text" name="apellido">
                <label>Fecha de nacimiento:</label>
                <input required  class="form-control" type="date" name="fecha_nacimiento">
                <label>Telefono:</label>
                <input required  class="form-control" type="text" name="telefono">
                <label>Departamento:</label>
                <input required  class="form-control" type="text" name="departamento">
                <label>Ciudad/Municipio:</label>
                <input required  class="form-control" type="text" name="ciudad_municipio">
                <label>Direccion:</label>
                <input required  class="form-control" type="text" name="direccion">
                <br/>
                <h3>Información de inicio de sesión.</h3>
                <label>Email:</label>
                <input required  class="form-control" type="email" name="email">
                <label>Contraseña:</label>
                <input required  class="form-control" type="password" name="contrasenia1" id="contrasenia1">
                <label>Confirmar contraseña:</label>
                <input required  class="form-control" type="password" name="contrasenia2" id="contrasenia2">
                <br/>
                <button disable="disable" class="btn btn-success" type="submit">Crear cuenta</button>
            </form>
        </div>
    </div>
</div>

<?php include ('pie.php'); ?>