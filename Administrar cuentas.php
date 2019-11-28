<!doctype html>
<html lang="en">
<!--
Page    : index / MobApp
Version : 1.0
Author  : Colorlib
URI     : https://colorlib.com
 -->

<head>
    <title>Administrar cuentas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">

    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="css/style.css" rel="stylesheet">
    <script>
        function envia() {
            var nomb=getElementsById('inputNombreFB').value;
            var correo=getElementById('inputCorreo').value;
            var facebook=getElementById('inputNombre').value;
            window.location="consulta_cuenta.php?nomb"+nomb+"&correo="+correo+"&facebook="+facebook;
        }
    </script>
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">

    <!-- Nav Menu -->
    <header class="bg-gradient" id="home"> 
    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <div class="col-md-2" class="col-lg-2" class="col-sm-2"><img width=100%  src="images/logo.png" class="" alt="logo"></div> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link" href="index.html">Cerrar Sesi&oacuten</a> </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>   
    </header>

    <div class="sidebar">
  <a href="Administrador.php">Administrar actividades</a>
  <a class="active" class="bg-gradient">Administrar Cuentas</a>
  <a href="alta_materia.php">Dar de alta materias</a>
  <a href="alta_juego.php">Dar de alta juegos</a>
  <a href="Estadistica.php">Estadistica</a>
    </div>
<br>
    
    <div class="container1">
        <h4>Administrar cuentas</h4>
        <form class="form-signin" method="POST" action="Administrar cuentas.php">
            <div class="form-label-group">
                <input type="text" id="inputCorreo" name="inputCorreo" class="form-control" placeholder="Correo electrónico">
                <label for=inputCorreo>Correo electrónico</label>   
                <div class="form-label-group">
                <input type="text" id="inputNombre" name="inputNombre" class="form-control" placeholder="Nombre">
                <label for=inputNombre>Nombre</label>
                <div class="form-label-group">
                <input type="text" id="inputNombreFB" name="inputNombreFB" class="form-control" placeholder="Nombre facebook">
                <label for=inputNombreFB>Nombre de Facebook</label>
                <button class="btn btn-lg btn-primary btn-block text-uppercase btn-success" type="submit" name="btn1">Buscar cuenta</button>
                </div>
                </div>
                <div>
                <table class="table">
                  <thead >
                    <tr>
                        <th>ID</th>
                      <th>Nombre</th>
                      <th>Nombre Facebook</th>
                      <th>Correo electrónico</th>
                      <?php
                      if(isset($_POST['btn1']))
                      {
                        include 'databasecon.php';
                        $nomb=$_POST['inputNombre'];
                        $correo=$_POST['inputCorreo'];
                        $facebook=$_POST['inputNombreFB'];

                        $query="select * from usuario where nombre like '%".$nomb."%' and correo like '%".$correo."%' and nombre_facebook like '%".$facebook."%';";
                        $result=pg_query($query) or die('La consulta fallo: ' . pg_last_error());

                        while($mostrar=pg_fetch_array($result))
                        {
                    ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td><?php echo $mostrar['idusuario']?></td>
                    <td><?php echo $mostrar['nombre']?></td>
                    <td><?php echo $mostrar['nombre_facebook']?></td>
                    <td><?php echo $mostrar['correo']?></td>
                    </tr>
                   
                  </tbody>
                    <?php
                    }}
                    include 'close.php';
                  ?>
                </table>
            </div>
        </div>
        </form>
            <form class="form-signin" method="POST" action="Administrar cuentas.php">
                <div class="form-label-group">
                <input type="text" id="inputID" name="inputID" class="form-control" placeholder="ID de la cuenta" required>
                <label for=inputID>ID de la cuenta</label>  
                <button class="btn btn-lg btn-primary btn-block text-uppercase btn-success" name="btn2" type="submit">Borrar cuenta</button>
                </div>
                <?php
                    include 'databasecon.php';
                    if(isset($_POST['btn2']))
                    {
                        $correo2=$_POST['inputID'];
                        
                        $query2="delete from usuario where idusuario='".$correo2."';";
                        pg_query($query2) or die('La consulta fallo: ' . pg_last_error());
                    }
                    include 'close.php';
                ?>
                </form>

            </div>
            

        <!-- jQuery and Bootstrap -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>
</body>
</html>