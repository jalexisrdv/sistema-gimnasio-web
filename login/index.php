<?php

session_start();

if(!empty($_SESSION) && isset($_SESSION)) {
    require_once '../includes/validations/access.php';
    validarAcceso($_SESSION["tipoUsuario"], "../");
}

require_once 'controllers/clogin.php';