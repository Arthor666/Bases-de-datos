<!doctype html>
<html lang="en">
<!--
Page    : index / MobApp
Version : 1.0
Author  : Colorlib
URI     : https://colorlib.com
 -->

<head>
    <title>Administrador</title>
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
  <a class="active" class="bg-gradient">Administrar actividades</a>
  <a href="Administrar cuentas.php">Administrar Cuentas</a>
  <a href="alta_materia.php">Dar de alta materias</a>
  <a href="alta_juego.php">Dar de alta juegos</a>
  <a href="Estadistica.php">Estadistica</a>
    </div>
    

    <div class="container1">
            
            <h4>Administrar actividades</h4>
            <form class="form-signin" method="POST" action="Administrador.php">
                <div class="form-label-group">
                <input type="text" id="input" name="input" class="form-control" placeholder="Nombre de actividad" required>
                <label for=input>Nombre de la actividad ó anfitrion ó lugar u hora ó fecha</label>
                <button class="btn btn-lg btn-primary btn-block text-uppercase btn-success" name="btn1" type="submit">Buscar actividad</button>
                
                </div>
            </form>
                <div>
                <table class="table">
                  <thead >
                    <tr>
                      <th width="2">ID</th>
                      <th>Anfitrion</th>
                      <th>Nombre de la actividad</th>
                      <th>Lugar</th>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <?php
                      if(isset($_POST['btn1']))
                      {
                        include 'databasecon.php';
                        $entrada=$_POST['input'];
                        $query="select * from busqueda_actividades where con like '%".$entrada."%';";
                        $result=pg_query($query) or die('La consulta fallo: ' . pg_last_error());

                        while($mostrar=pg_fetch_array($result))
                        {
                    ?>
                    </tr>
                  </thead>
                  <tbody>
                   <tr>
                    <td><?php echo $mostrar['idactividad']?></td>
                    <td><?php echo $mostrar['anfitrion']?></td>
                    <td><?php echo $mostrar['nombre']?></td>
                    <td><?php echo $mostrar['lugar']?></td>
                    <td><?php echo $mostrar['fec_actividad']?></td>
                    <td><?php echo $mostrar['hora_i']?></td>
                    </tr>
                   
                  </tbody>
                    <?php
                    }}
                    include 'close.php';
                  ?>
                </table>
                </div>
                <form class="form-signin" method="POST" action="Administrador.php">
                <div class="form-label-group">
                <input type="text" id="inputidact" name="inputidact" class="form-control" placeholder="id actividad"required>
                <label for=inputidact>ID de la actividad</label>
                <button class="btn btn-lg btn-primary btn-block text-uppercase btn-success" name="btn4" type="submit">Borrar actividad</button>
                <?php
                include 'databasecon.php';
                if (isset($_POST['btn4'])) {
                    $entrada1=$_POST['inputidact'];
                    $query2="delete from actividad where idactividad='".$entrada1."';";
                    pg_query($query2) or die('La consulta fallo: ' . pg_last_error());
                }
                include 'close.php';
                  ?>
              </div>
          </form>
      </div>


              <!-- // end .section -->

    <!-- jQuery and Bootstrap -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>
</body>
</html>