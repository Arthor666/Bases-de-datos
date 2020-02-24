<!doctype html>
<html lang="en">
<?php
include 'sesion.php';
?>
<head>
    <title>Buscar Eventos</title>
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
        function buscar(){
            var busqueda=document.getElementById("PalabraClave").value;
            window.Location="Busqueda.php?busqueda="+busqueda;
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
                                <li class="nav-item"> <a class="nav-link" href="configuracion.php">Configuraci&oacuten</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="cerrar.php">Cerrar Sesi&oacuten</a> </li>
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
  <a href="pagina_principal.php">Inicio</a>
  <a href="iniciar_evento.php">Iniciar Evento</a>
  <a href="mis_eventos.php">Mis Eventos</a>
  <a class="active" class="bg-gradient">Buscar Evento</a>
  <a href="notificaciones.php">Notificaciones</a>
    </div>
<br>
    <div class="container1">
        <h4>Encuentra tu actividad:</h4>
        <div class="flexsearch">
            <div class="flexsearch--wrapper">
                <form class="flexsearch--form" method="POST">
                    <div class="flexsearch--input-wrapper">
                        <input name="palabra" class="flexsearch--input" type="search" placeholder=" Pon palabras claves" method="POST">
                    </div>
                <input class="flexsearch--submit" type="submit" name="buscador" value="&#10140;"/>
                </form>
            </div>
        </div>

        <h3> Resultado</h3>
    <table>
  <tr>
    <th>N&uacutemero</th>
    <th>Actividad</th>
    <th>Lugar</th>
    <th>Fecha</th>
    <th>Hora Inicio</th>
    <th>Hora Fin</th>
    <th></th>
    <th></th>
  </tr>


  <?php
    include 'databasecon.php';
    $buscar = (isset($_POST['palabra'])) ? $_POST['palabra'] : '';
    $buscador = (isset($_POST['buscador'])) ? $_POST['buscador'] : '';
    if($buscador==NULL){

    }else{
    $query="SELECT idactividad,nombre,lugar,fec_actividad,hora_i,hora_f FROM tus_eventos WHERE nombre LIKE '%".$buscar."%' AND idusuario!=".$_SESSION['usuario'].";";
    $result=pg_query($query) or die('La consulta fallo: ' . pg_last_error());
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "<tr>";
    foreach ($line as $col_value) {
        echo "<td>$col_value</td>";
    }
    $i=0;
    echo "<td>
        <a href='participa.php?act=".$line["idactividad"]."'><input type='button' value='Participar' class='btn participar_btn' onClick='participacion()'></a>

    </td>";
    echo "</tr>";
    }
    include 'close.php';
}
  ?>
</table>

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
