<?php

session_start();

if(empty($_SESSION)) {
    header('Location: ../../login/');
}
if($_SESSION["tipoUsuario"]!="entrenador") {
    require_once '../../includes/validations/access.php';
    validarAcceso($_SESSION["tipoUsuario"], "../../");
}

require_once 'controllers/cborrar-asignacion.php';