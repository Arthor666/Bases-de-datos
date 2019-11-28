<!doctype html>
<html lang="en">
<!--
Page    : index / MobApp
Version : 1.0
Author  : Colorlib
URI     : https://colorlib.com
 -->

<head>
    <title>Estadistica</title>
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
  <a href="Administrar Cuentas.php">Administrar Cuentas</a>
  <a href="alta_materia.php">Dar de alta materias</a>
  <a href="alta_juego.php">Dar de alta juegos</a>
  <a class="active" class="bg-gradient">Estadistica</a>
    </div>
<br>
    <div class="container1">
        <h4>Actividad más solicitada</h4>
        <div>
                <table class="table">
                  <thead>
                    <tr>
                      <th width="2">Frecuencia</th>
                      <th>Nombre de la actividad</th>
                      <?php
                      include 'databasecon.php';
                      $query="select count(a.idcatalogo) as frecuencia,c.nombre from actividad_catalogoactividad a join catalogo_actividad c on a.idcatalogo=c.idcatalogo group by (a.idcatalogo,c.nombre) order by frecuencia desc limit 1;";
                        $result=pg_query($query) or die('La consulta fallo: ' . pg_last_error());
                        while($mostrar=pg_fetch_array($result))
                        {
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td><?php echo $mostrar['frecuencia']?></td>
                    <td><?php echo $mostrar['nombre']?></td>
                    </tr>
                  </tbody>
                  <?php
                    }
                    include 'close.php';
                  ?>
                </table>
                </div>
        <br>
        <h4>Juego más solicitado</h4>
        <div>
                <table class="table">
                  <thead>
                    <tr>
                      <th width="2">Frecuencia</th>
                      <th>Nombre del Juego</th>
                      <?php
                      include 'databasecon.php';
                      $query="select count(a.idjuego),j.nombre from actividad_juegos a join juego j on j.idjuego=a.idjuego group by (j.nombre,a.idjuego) order by count desc limit 1;";
                        $result=pg_query($query) or die('La consulta fallo: ' . pg_last_error());
                        while($mostrar=pg_fetch_array($result))
                        {
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td><?php echo $mostrar['count']?></td>
                    <td><?php echo $mostrar['nombre']?></td>
                    </tr>
                  </tbody>
                  <?php
                    }
                    include 'close.php';
                  ?>
                </table>
                </div>
        <br>
        <h4>Materia más solicitada</h4>
        <div>
                <table class="table">
                  <thead>
                    <tr>
                      <th width="2">Frecuencia</th>
                      <th>Materia</th>
                      <?php
                      include 'databasecon.php';
                      $query="select count(a.idmateria),m.nombre from actividad_materias a join materia m on m.idmateria=a.idmateria group by (m.nombre,a.idmateria) order by count desc limit 1;";
                        $result=pg_query($query) or die('La consulta fallo: ' . pg_last_error());
                        while($mostrar=pg_fetch_array($result))
                        {
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td><?php echo $mostrar['count']?></td>
                    <td><?php echo $mostrar['nombre']?></td>
                    </tr>
                  </tbody>
                  <?php
                    }
                    include 'close.php';
                  ?>
                </table>
                </div>
        <br>
        <h4>Promedio de actividades por día</h4>
        <div>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Promedio</th>
                      <?php
                      include 'databasecon.php';
                      $query="select avg(frecuencia) from (select count(fec_actividad) as frecuencia from actividad group by fec_actividad) as suma;";
                        $result=pg_query($query) or die('La consulta fallo: ' . pg_last_error());
                        while($mostrar=pg_fetch_array($result))
                        {
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td><?php echo $mostrar['avg']?></td>
                    </tr>
                  </tbody>
                  <?php
                    }
                    include 'close.php';
                  ?>
                </table>
                </div>
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