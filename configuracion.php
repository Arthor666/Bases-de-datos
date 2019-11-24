<!doctype html>
<html lang="en">
<?php
include 'sesion.php';
?>
<head>
    <title>Soledad Escomiana</title>
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
    function nombre(){
      var nombre=document.getElementById('nombre').value;
      window.location="Actualiza_nombre.php?nombre="+nombre;
    }
    function nombref(){
      var nombre_facebook=document.getElementById('n_f').value;
      window.location="Actualiza_nombre_f.php?n_f="+nombre_facebook;
    }
    function correo(){
      var correo=document.getElementById("correo").value;
      window.location="Actualiza_correo.php?correo="+correo;
    }
    </script>
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="40">

    <!-- Nav Menu -->

    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link"><a href="pagina_principal.php">Inicio</a> </li>
                                <div class="col-md-10" class="col-lg-10" class="col-sm-10">
                                <li class="nav-item"><a class="nav-link"><a href="index.html">Cerrar sesi&oacuten</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <header class="bg-gradient" id="home">
        <div class="container mt-5">
            <h1>Configuracion</h1>
        </div>

    </header>

</body>
                <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Actualiza tu nombre</h5>
            <form class="form-signin">
                <div class="form-label-group">
                <input type="input" id="nombre" class="form-control">
                <label for="inputUserame">Tu nuevo nombre</label>
                <a onclick="nombre()">
                  <input type="button" value="Actualizar"  class="btn btn-lg btn-primary btn-block text-uppercase">
                </a>
              </div>
              <h5 class="card-title text-center">Actualiza tu nombre de facebook</h5>
            <form class="form-signin">
                <div class="form-label-group">
                <input type="input" id="n_f" class="form-control" >
                <label for="inputUserameFB">Tu nuevo nombre de facebook</label>
                <a onclick="nombref()">
                  <input type="button" value="Actualizar Nombre en facebook"  class="btn btn-lg btn-primary btn-block text-uppercase">
                </a>
              </div>
              <h5 class="card-title text-center">Actualiza tu correo electrónico</h5>
            <form class="form-signin">
                <div class="form-label-group">
                <input type="input" id="correo" class="form-control">
                <label for="inputUserameEmail">Tu nuevo correo electrónico</label>
                <a onclick="correo()">
                <input type="button" class="btn btn-lg btn-primary btn-block text-uppercase" value="Actualizar Correo">
              </a>
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
