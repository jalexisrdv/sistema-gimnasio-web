<?php

if(!empty($_GET) && isset($_GET)) {
    require_once '../../models/dtos/ClienteDTO.php';
    require_once '../../models/dtos/UsuarioDTO.php';
    require_once '../../models/daos/ClienteDAO.php';
    require_once '../../models/daos/UsuarioDAO.php';

    $clienteDAO = new ClienteDAO();
    $usuarioDAO = new UsuarioDAO();

    $clienteDTO = $clienteDAO->obtenerClienteById($_GET["idcliente"]);

    $usuarioDTO = $usuarioDAO->obtenerUsuarioById($clienteDTO->getIdUsuario());
    $usuarioDTO->setStatus(0);
    
    $usuarioDAO->actualizarUsuarioById($usuarioDTO);

    header('Location: index.php');
}