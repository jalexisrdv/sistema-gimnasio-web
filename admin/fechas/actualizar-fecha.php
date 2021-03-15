<?php

session_start();

if(empty($_SESSION)) {
    header('Location: ../../login/');
}
if($_SESSION["tipoUsuario"]!="administrador") {
    require_once '../../includes/validations/access.php';
    validarAcceso($_SESSION["tipoUsuario"], "../../");
}
if(isset($_GET) && !empty($_GET)) {
    $idFecha = $_GET['idfecha'];
}

require_once 'controllers/cupdate.php';