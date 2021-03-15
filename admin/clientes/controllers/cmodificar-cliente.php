<?php

$errorMsj = "";

require_once '../../models/dtos/ClienteDTO.php';
require_once '../../models/dtos/UsuarioDTO.php';
require_once '../../models/daos/ClienteDAO.php';
require_once '../../models/daos/UsuarioDAO.php';
require_once '../../includes/utils/fechas.php';

$clienteDAO = new ClienteDAO();
$usuarioDAO = new UsuarioDAO();

if(!empty($_POST) && isset($_POST)) {

    $clienteDTO = new ClienteDTO();
    $usuarioDTO = new UsuarioDTO();

    $cliente = $clienteDAO->obtenerClienteById($_POST["id"]);

    $clienteDTO->setId($cliente->getId());
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
    $clienteDTO->setPesoProgreso($cliente->getPesoProgreso());
    $clienteDTO->setUrlFoto($cliente->getUrlFoto());
    $clienteDTO->setIdSucursal($cliente->getIdSucursal());

    $usuarioDTO->setId($cliente->getIdUsuario());
    $usuarioDTO->setNick($cliente->getNick());
    $usuarioDTO->setPassword($_POST["password"]);
    $usuarioDTO->setTipo("cliente");
    $usuarioDTO->setStatus($cliente->getStatus());

    $usuario = $usuarioDAO->obtenerUsuarioByNick($_POST["nick"]);

    /*actualiza el nombre de usuario si este aun no existe o si es el mismo y
    ya se encuentra en la db (esto indica que no hubo cambio en el campo nick)*/
    if($usuario->getNick() == "" || $usuario->getNick() == $usuarioDTO->getNick()) {
        $usuarioDTO->setNick($_POST["nick"]);
        $usuarioDAO->actualizarUsuarioById($usuarioDTO);
        $clienteDAO->actualizarClienteById($clienteDTO);
        $_POST = array();
        header('Location: index.php');
    }else {
        $nick = $_POST["nick"];
        $errorMsj = "El nombre de usuario (nick) $nick ya existe";
        $_GET['idcliente'] = $_POST["id"];
    }

}

if(!empty($_GET) && isset($_GET)) {

    $clienteDTO = $clienteDAO->obtenerClienteById($_GET['idcliente']);

    $_POST["id"] = $clienteDTO->getId();
    $_POST["nombre"] = $clienteDTO->getNombre();
    $_POST["apellidos"] = $clienteDTO->getApellidos();
    $_POST["fecha_nacimiento"] = $clienteDTO->getFechaNacimiento();
    $_POST["email"] = $clienteDTO->getEmail();
    $_POST["fecha_ingreso"] = $clienteDTO->getFechaIngreso();
    $_POST["nivel_cliente"] = $clienteDTO->getNivelCliente();
    $_POST["estatura"] = $clienteDTO->getEstatura();
    $_POST["peso_inicial"] = $clienteDTO->getPesoInicial();
    $_POST["peso_progreso"] = $clienteDTO->getPesoProgreso();
    $_POST["url_foto"] = $clienteDTO->getUrlFoto();
    $_POST["status"] = $clienteDTO->getStatus();
    $_POST["nick"] = $clienteDTO->getNick();
    $_POST["id_sucursal"] = $clienteDTO->getIdSucursal();
    $_POST["id_usuario"] = $clienteDTO->getIdUsuario();

    $usuarioDTO = $usuarioDAO->obtenerUsuarioById($clienteDTO->getIdUsuario());

    $_POST["password"] = $usuarioDTO->getPassword();

}

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vregistro-cliente.php';
require_once '../../includes/views/vfooter.php';