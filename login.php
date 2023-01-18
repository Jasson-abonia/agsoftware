<?php include ('setting\validationLogin.php'); ?>

<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-md-4">
            <br/>
                <div class="card">
                    <div class="card-header">
                     <p>inicio sesion</p>   
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            Usuario: <input class="form-control" type="email" name="email_usuario"><br/>
                            Contraseña: <input class="form-control" type="password" name="contrasenia"><br/>
                            <button class="btn btn-success" type="submit">Iniciar sesion</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        
                    </div>
                </div>
                
            </div>
            <div class="col-md-4">
                <h2>Nuevo cuenta</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam explicabo dolor officia, odit sapiente incidunt. Corporis, laborum natus nemo</p>
                <a class="btn btn-success" href="createUser.php">Crear cuenta</a>
            </div>
        </div>
    </div>
    
</body>

</html>