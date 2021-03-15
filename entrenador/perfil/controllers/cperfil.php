<?php

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
//require_once 'views/vperfil.php';
//require_once '../../includes/views/vfooter.php';
if(isset( $_SESSION["idUsuario"]) && !empty( $_SESSION["idUsuario"])) {
    
    require_once '../../models/daos/EntrenadorDAO.php';
    require_once '../../models/dtos/EntrenadorDTO.php';
    
    $entrenadorDAO = new EntrenadorDAO();
    $entrenadores=$entrenadorDAO->obtenerEntrenadorByIdUsuario($_SESSION["idUsuario"]);
    
    require_once 'views/vperfil.php';
    require_once '../../includes/views/vfooter.php';

}
    
