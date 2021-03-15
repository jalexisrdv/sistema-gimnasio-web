<?php

session_start();

if(empty($_SESSION)) {
    header('Location: ../../login/');
}
if($_SESSION["tipoUsuario"]!="administrador") {
    require_once '../../includes/validations/access.php';
    validarAcceso($_SESSION["tipoUsuario"], "../../");
}

require_once 'controllers/cregistro.php';