<!doctype html>
<html lang="en">
<?php
include 'sesion.php';
?>

<head>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });
</script>

<script type="text/javascript">
function mostrar(id) {
    if (id == "asesoria") {
        $("#asesoria").show();
        $("#jugar").hide();
        $("#nintendo").hide();
        $("#PC").hide();
        $("#platicar").hide();

    }
    if (id == "jugar") {
        $("#asesoria").hide();
        $("#jugar").show();
        $("#platicar").hide();
        $("#matematicas").hide();
        $("#programacion").hide();
    }
    if (id == "platicar"){
        $("#asesoria").hide();
        $("#jugar").hide();
        $("#platicar").show();
        $("#nintendo").hide();
        $("#PC").hide();
        $("#matematicas").hide();
        $("#programacion").hide();
    }
    if (id == "nintendo"){
        $("#nintendo").show();
        $("#PC").hide();
    }
    if (id == "pc"){
        $("#nintendo").hide();
        $("#PC").show();
    }
    if (id == "matematicas"){
        $("#matematicas").show();
        $("#programacion").hide();
    }
    if (id == "programacion"){
        $("#matematicas").hide();
        $("#programacion").show();
    }
}

function enviar(){
  var act=$('input:radio[name=opcion]:checked').val();
  if(act=='platicar'){
    var lugar=document.getElementById('lugar').value;
    var fecha=document.getElementById('fecha').value;
    var hora=document.getElementById('hora').value;
    var esp =document.getElementById('esp').value;
    var id=document.getElementById('otro').value;
    window.location="new_act_soc.php?lugar="+lugar+"&&fecha="+fecha+"&&hora="+hora+"&&esp="+esp+"&&id="+id+"&&estado=0";
  }else if(act=='jugar'){
    var lugar=document.getElementById('lugar').value;
    var fecha=document.getElementById('fecha').value;
    var hora=document.getElementById('hora').value;
    var esp =document.getElementById('esp').value;
    var id=document.getElementById('juego').value;
    window.location="new_act_geek.php?lugar="+lugar+"&&fecha="+fecha+"&&hora="+hora+"&&esp="+esp+"&&id="+id+"&&estado=0";
  }else if(act=='asesoria'){
    var lugar=document.getElementById('lugar').value;
    var fecha=document.getElementById('fecha').value;
    var hora=document.getElementById('hora').value;
    var esp =document.getElementById('esp').value;
    var id=document.getElementById('materia').value;
    window.location="new_act_asesoria.php?lugar="+lugar+"&&fecha="+fecha+"&&hora="+hora+"&&esp="+esp+"&&id="+id+"&&estado=0";
  }
}
</script>

    <title>Iniciar Evento</title>
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
  <a class="active" class="bg-gradient">Iniciar Evento</a>
  <a href="mis_eventos.php">Mis Eventos</a>
  <a href="buscar_evento.php">Buscar Evento</a>
  <a href="sugerir_evento.html">Sugerir evento</a>
  <a href="notificaciones.php">Notificaciones</a>
    </div>

    <div class="container1">
        <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <div class="btn -btn-primary">
                                    <h4 class="card-title">
                                    <label class="caja">    Socializar
                                        <input type="radio"  name="opcion" value="platicar" onclick="mostrar(this.value);" requiered>
                                        <span class="checkmark" id="status"></span>
                                    </label></h4>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <div class="btn -btn-primary">
                                    <h4 class="card-title">
                                    <label class="caja">    Jugar
                                        <input type="radio"  name="opcion" value="jugar" onclick="mostrar(this.value);" requiered>
                                        <span class="checkmark" id="status"></span>
                                    </label></h4>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <div class="btn -btn-primary">
                                        <h4 class="card-title">
                                    <label class="caja">    Asesor&iacutea
                                        <input type="radio"  name="opcion" value="asesoria" onclick="mostrar(this.value);" requiered>
                                        <span class="checkmark" id="status"></span>
                                    </label></h4>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="platicar" style="display: none;">
              <br>
              <select id="otro" class="custom-select d-block w-10" name="opcion" onchange="area.disabled = false" requiered>
              <option disabled selected="">Selecciona una opción</option>
                <?php
                  include "databasecon.php";
                  $query="SELECT * from catalogo_actividad;";
                  $result=pg_query($query) or die('La consulta fallo: ' . pg_last_error());
                  while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                    echo "<option value='".$line['idcatalogo']."'>".$line['nombre']."</option>";
                  }
                  include "close.php"
                ?>
          </select>
            </div>

            <div class="col-md-3" id="jugar" style="display: none;"><br>
              <select id="juego" class="custom-select d-block w-100" name="opcion" onchange="area.disabled = false" requiered>
              <option disabled selected="">Selecciona un juego</option>
                <?php
                  include "databasecon.php";
                  $query="SELECT * from juego;";
                  $result=pg_query($query) or die('La consulta fallo: ' . pg_last_error());
                  while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                    echo "<option value='".$line['idjuego']."'>".$line['nombre']."</option>";
                  }
                  include "close.php"
                ?>
          </select>
            </div>

<!--**************************************MATERIAS***********************************************-->

            <div class="col-md-3" id="asesoria" style="display: none;">        <br>
              <select class="custom-select d-block w-100" id="materia" name="opcion" onchange="area.disabled = false" requiered>
              <option disabled selected="">Selecciona una materia</option>
                <?php
                  include "databasecon.php";
                  $query="SELECT * from materia;";
                  $result=pg_query($query) or die('La consulta fallo: ' . pg_last_error());
                  while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                    echo "<option value='".$line['idmateria']."'>".$line['nombre']."</option>";
                  }
                  include "close.php"
                ?>
            </select>
            </div>

<!--***********************************JUEGOS*****************************************-->
            <br>
            <select id="lugar"  class="custom-select d-block w-10" name="opcion" onchange="area.disabled = false" requiered>
            <option disabled selected="">Selecciona un lugar</option>
              <?php
                include "databasecon.php";
                $query="SELECT * from lugar;";
                $result=pg_query($query) or die('La consulta fallo: ' . pg_last_error());
                while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                  echo "<option value='".$line['idlugar']."'>".$line['nombre']."</option>";
                }
                include "close.php"
              ?>
        </select>
        <br>

        <input type="date" class="custom-select d-block w-10" id="fecha">
        <br>
        <br>

        <select id="hora" class="custom-select d-block w-10" name="opcion" requiered>
            <option disabled selected>Selecciona una hora</option>
            <option>07:00 - 08:30</option>
            <option>08:30 - 10:00</option>
            <option>10:30 - 12:00</option>
            <option>12:00 - 13:30</option>
            <option>13:30 - 15:00</option>
            <option>15:00 - 16:30</option>
            <option>16:30 - 18:00</option>
            <option>18:30 - 20:00</option>
            <option>20:00 - 21:30</option>

        </select>
        <br>

        <input type="text" id="esp" name="opcion" placeholder="Especifica el lugar"  rows="1">

        <div class="form-group">
                  <a onclick="enviar()">
                        <input type="submit" name="opcion" value="Guardar" class="btn guardar_btn">
                      </a>
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
