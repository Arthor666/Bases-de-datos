<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: inicia_sesion.html");
        exit;
    }
?>