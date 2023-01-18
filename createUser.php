<?php include ('cabecera.php'); ?>
<?php include ('setting\addUser.php'); ?>

<div class="content-form">
    <form action="createUser.php" method="post">
        <h3>Tipo de cuenta.</h3>
        <select class="form-control" name="cuenta">
            <option value=""></option>
            <option value="Estudiante" <?php echo ($tipoCuenta=="Estudiante")?"selected":""?>>Estudiante</option>
            <option value="Administrador" <?php echo ($tipoCuenta=="Administrador")?"selected":""?>>Administrador</option>
        </select>
        <br/>
        <h3>Más Información.</h3>
        <label>Nombre:</label>
        <input class="form-control" type="text" name="nombre">
        <label>Apellido:</label>
        <input class="form-control" type="text" name="apellido">
        <label>Fecha de nacimiento:</label>
        <input class="form-control" type="date" name="fecha_nacimiento">
        <label>Telefono:</label>
        <input class="form-control" type="text" name="telefono">
        <label>Departamento:</label>
        <input class="form-control" type="text" name="departamento">
        <label>Ciudad/Municipio:</label>
        <input class="form-control" type="text" name="ciudad_municipio">
        <label>Direccion:</label>
        <input class="form-control" type="text" name="direccion">
        <br/>
        <h3>Información de inicio de sesión.</h3>
        <label>Email:</label>
        <input class="form-control" type="email" name="email">
        <label>Contraseña:</label>
        <input class="form-control" type="text" name="contrasenia">
        <label>Confirmar contraseña:</label>
        <input class="form-control" type="text" name="fcontrasenia">
        <br/>
        <button class="btn btn-success" type="submit">Crear cuenta</button>

    </form>
</div>

<style>
    .content-form {
        max-width: 445px;
        margin: 0 auto;
    }

    .content-form form {
        display: flex;
        flex-direction: column;
        margin: 50px auto;
    }
</style>

<?php include ('pie.php'); ?>