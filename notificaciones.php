<!doctype html>
<html lang="en">
<?php
    include 'sesion.php'
?>
<!--
Page    : index / MobApp
Version : 1.0
Author  : Colorlib
URI     : https://colorlib.com
 -->

<head>
    <title>Notificaciones</title>
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
  <a class="buscar_evento.php">Buscar Evento</a>
  <a class="active" class="bg-gradient">Notificaciones</a>
    </div>
<br>
    <div class="container1">
        <h4>Notificaciones</h4>
        <div class="flexsearch">
            <div class="flexsearch--wrapper">
<?php
    include 'databasecon.php';
    $eventos="SELECT tus_eventos.nombre FROM participantes JOIN tus_eventos ON participantes.idactividad=tus_eventos.idactividad JOIN usuario ON usuario.idusuario=participantes.idusuario
        WHERE participantes.idusuario<>tus_eventos.idusuario AND tus_eventos.idusuario='".$_SESSION["usuario"]."'";
    $participantes="SELECT usuario.nombre FROM participantes JOIN tus_eventos ON participantes.idactividad=tus_eventos.idactividad JOIN usuario ON usuario.idusuario=participantes.idusuario
        WHERE participantes.idusuario<>tus_eventos.idusuario AND tus_eventos.idusuario='".$_SESSION["usuario"]."'";
    if($participantes==NULL || $eventos==NULL){
        echo "<p> Nadie se ha unido a niguna actividad tuya, quiz&aacutes sea porque no hayas creado ninguna actividad a&aacuten</p>";
    }else{
    $resultparticipante=pg_query($participantes) or die('La consulta fallo: ' . pg_last_error());
    $resultEvento=pg_query($eventos) or die('La consulta fallo: ' . pg_last_error());
    while ($line = pg_fetch_array($resultparticipante, null, PGSQL_ASSOC)) {
        while ($linea = pg_fetch_array($resultEvento, null, PGSQL_ASSOC)) {
            foreach ($line as $col_value) {
                foreach($linea as $columna_value){
                    echo "$col_value quiere participar en tu evento '".$columna_value."'<br>";
                }
            }
        }
    }
        include 'close.php';
    }
?>
            </div>
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
