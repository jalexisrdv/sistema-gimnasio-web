<?php

if(!empty($_GET) && isset($_GET)) {
    require_once '../../models/dtos/EntrenadorDTO.php';
    require_once '../../models/dtos/UsuarioDTO.php';
    require_once '../../models/daos/EntrenadorDAO.php';
    require_once '../../models/daos/UsuarioDAO.php';

    $entrenadorDAO = new EntrenadorDAO();
    $usuarioDAO = new UsuarioDAO();

    $entrenadorDTO = $entrenadorDAO->obtenerEntrenadorById($_GET["identrenador"]);

    $usuarioDTO = $usuarioDAO->obtenerUsuarioById($entrenadorDTO->getIdUsuario());
    $usuarioDTO->setStatus(0);
    
    $usuarioDAO->actualizarUsuarioById($usuarioDTO);

    header('Location: index.php');
}