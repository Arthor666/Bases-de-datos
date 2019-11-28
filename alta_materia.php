<!doctype html>
<html lang="en">
<!--
Page    : index / MobApp
Version : 1.0
Author  : Colorlib
URI     : https://colorlib.com
 -->

<head>
    <title>Dar de alta una materia</title>
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
  <a href="Administrar cuentas.php">Administrar Cuentas</a>
  <a class="active" class="bg-gradient">Dar de alta materias</a>
  <a href="alta_juego.php">Dar de alta juegos</a>
  <a href="Estadistica.php">Estadistica</a>
    </div>
<br>
    <div class="container1">
        <h4>Dar de alta una materia</h4>
        <form class="form-signin" method="POST" action="alta_materia.php">
                <div class="form-label-group">
                <input type="text" id="inputNombreMat" name="inputNombreMat" class="form-control" placeholder="Nombre materia"required>
                <label for=inputNombreMat>Nombre de la materia</label>   
                <button class="btn btn-lg btn-primary btn-block text-uppercase btn-success" name="btn1" type="submit">Dar de alta</button>
              </div>
               
                <?php
                include 'databasecon.php';
                if(isset($_POST['btn1']))
                {
                    $nom=$_POST['inputNombreMat'];
                    $query="insert into materia (nombre) values ('".$nom."');";
                    pg_query($query) or die('La consulta fallo: ' . pg_last_error());
                }
                include 'close.php';
                ?>
            </form>
                <h4>Dar de baja una materia</h4>
                <form class="form-signin" method="POST" action="alta_materia.php">
                <div class="form-label-group">
                <input type="text" id="inputNombreMat1" name="inputNombreMat1" class="form-control" placeholder="Nombre materia"required>
                <label for=inputNombreMat1>ID de la materia</label>   
                <button class="btn btn-lg btn-primary btn-block text-uppercase btn-success" name="btn2" type="submit">Dar de baja</button>
              </div>
              <?php
                include 'databasecon.php';
                if(isset($_POST['btn2']))
                {
                    $nom2=$_POST['inputNombreMat1'];
                    $query2="delete from materia where idmateria='".$nom2."';";
                    pg_query($query2) or die('La consulta fallo: ' . pg_last_error());
                }
                include 'close.php';
                ?>
                <div>
                <table class="table">
                  <thead>
                    <tr>
                      <th width="2">ID</th>
                      <th>Nombre de la materia</th>
                      <?php
                      include 'databasecon.php';
                      $query3="select * from materia;";
                        $result3=pg_query($query3) or die('La consulta fallo: ' . pg_last_error());
                        while($mostrar3=pg_fetch_array($result3))
                        {
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td><?php echo $mostrar3['idmateria']?></td>
                    <td><?php echo $mostrar3['nombre']?></td>
                    </tr>
                  </tbody>
                  <?php
                    }
                    include 'close.php';
                  ?>
                </table>
                 </div>
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