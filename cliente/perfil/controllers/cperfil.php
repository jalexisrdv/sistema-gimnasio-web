<?php

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';

if(isset( $_SESSION["idUsuario"]) && !empty( $_SESSION["idUsuario"])) {
    
    require_once '../../models/daos/ClienteDAO.php';
    require_once '../../models/dtos/ClienteDTO.php';
    
    $clienteDAO = new ClienteDAO();
    $clientes=$clienteDAO->obtenerClienteByIdUsuario($_SESSION["idUsuario"]);
    
    require_once 'views/vperfil.php';
    require_once '../../includes/views/vfooter.php';
}
    