<?php

if (isset($_POST['btnLogin'])) {

    require_once '../models/daos/UsuarioDAO.php';
    require_once '../models/dtos/UsuarioDTO.php';
    require_once '../models/daos/ClienteDAO.php';
    require_once '../models/dtos/ClienteDTO.php';
    require_once '../models/daos/EntrenadorDAO.php';
    require_once '../models/dtos/EntrenadorDTO.php';

    $usuarioDAO = new UsuarioDAO();

    $nick = $_POST['nick'];
    $password = $_POST['password'];

    $usuarioDTO = $usuarioDAO->existeUsuario($nick, $password);

    if(empty($usuarioDTO)) {
        header("Location: ../login/");
    }

    $_SESSION["idUsuario"] = $usuarioDTO->getId();
    $_SESSION["tipoUsuario"] = $usuarioDTO->getTipo();
    $_SESSION["nick"] = $usuarioDTO->getNick();
    $_SESSION["status"] = $usuarioDTO->getStatus();

    switch($usuarioDTO->getTipo()) {
        case "administrador":
            //EL USUARIO TIPO ADMIN SIMPLEMENTE ES UN USUARIO, POR LO TANTO NO TIENE FOTO, ETC.
            $_SESSION["url_foto"] = "img/perfiles/admin.png";
            $_SESSION["id_sucursal"] = 1;
            header("Location: ../admin/");
        break;
        case "cliente":
            $clienteDAO = new ClienteDAO();
            $clienteDTO = $clienteDAO->obtenerClienteByIdUsuario($usuarioDTO->getId());
            $_SESSION["url_foto"] = $clienteDTO->getUrlFoto();
            $_SESSION["id_cliente"] = $clienteDTO->getId();
            $_SESSION["nivel"] = $clienteDTO->getNivelCliente();
            $_SESSION["id_sucursal"] = $clienteDTO->getIdSucursal();
            header("Location: ../cliente/");
        break;
        case "entrenador":
            $entrenadorDAO = new EntrenadorDAO();
            $entrenadorDTO = $entrenadorDAO->obtenerEntrenadorByIdUsuario($usuarioDTO->getId());
            $_SESSION["url_foto"] = $entrenadorDTO->getUrlFoto();
            $_SESSION["id_entrenador"] = $entrenadorDTO->getId();
            $_SESSION["nivel"] = $entrenadorDTO->getNivelEntrenador();
            $_SESSION["id_sucursal"] = $entrenadorDTO->getIdSucursal();
            header("Location: ../entrenador/");
        break;
    }

}

require_once 'views/vheader.php';
require_once 'views/vlogin.php';
require_once 'views/vfooter.php';