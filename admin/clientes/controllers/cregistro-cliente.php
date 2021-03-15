<?php

$errorMsj = "";

if(!empty($_POST) && isset($_POST)) {
    require_once '../../models/dtos/ClienteDTO.php';
    require_once '../../models/dtos/UsuarioDTO.php';
    require_once '../../models/daos/ClienteDAO.php';
    require_once '../../models/daos/UsuarioDAO.php';
    require_once '../../includes/utils/fechas.php';

    $clienteDTO = new ClienteDTO();
    $usuarioDTO = new UsuarioDTO();

    $clienteDAO = new ClienteDAO();
    $usuarioDAO = new UsuarioDAO();

    $clienteDTO->setNombre($_POST["nombre"]);
    $clienteDTO->setApellidos($_POST["apellidos"]);
    $fechaNacimiento = diaMesAnioToAnioMesDia($_POST["fecha_nacimiento"]);
    $clienteDTO->setFechaNacimiento($fechaNacimiento);
    $clienteDTO->setEmail($_POST["email"]);
    $fechaIngreso = diaMesAnioToAnioMesDia($_POST["fecha_ingreso"]);
    $clienteDTO->setFechaIngreso($fechaIngreso);
    $clienteDTO->setNivelCliente($_POST["nivel_cliente"]);
    $clienteDTO->setEstatura($_POST["estatura"]);
    $clienteDTO->setPesoInicial($_POST["peso_inicial"]);
    $clienteDTO->setPesoProgreso(0);
    $clienteDTO->setUrlFoto("/");

    $usuarioDTO->setNick($_POST["nick"]);
    $usuarioDTO->setPassword($_POST["password"]);
    $usuarioDTO->setTipo("cliente");
    $usuarioDTO->setStatus(1);

    echo $usuarioDTO->getNick();

    $usuario = $usuarioDAO->obtenerUsuarioByNick($usuarioDTO->getNick());

    if($usuario->getNick() == "") {
        $usuarioDAO->insertarUsuario($usuarioDTO);

        $clienteDTO->setIdUsuario($usuarioDAO->obtenerUltimoRegistro());
        $clienteDTO->setIdSucursal($_SESSION["id_sucursal"]);

        $clienteDAO->insertarCliente($clienteDTO);

        $_POST = array();

        header('Location: index.php');
    }else {
        $nick = $_POST["nick"];
        $errorMsj = "El nombre de usuario (nick) $nick ya existe";
    }

}

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vregistro-cliente.php';
require_once '../../includes/views/vfooter.php';