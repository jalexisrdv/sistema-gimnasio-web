<?php

$errorMsj = "";

require_once '../../models/dtos/EntrenadorDTO.php';
require_once '../../models/dtos/UsuarioDTO.php';
require_once '../../models/daos/EntrenadorDAO.php';
require_once '../../models/daos/UsuarioDAO.php';
require_once '../../includes/utils/fechas.php';

$entrenadorDAO = new EntrenadorDAO();
$usuarioDAO = new UsuarioDAO();

if(!empty($_POST) && isset($_POST)) {

    $entrenadorDTO = new EntrenadorDTO();
    $usuarioDTO = new UsuarioDTO();

    $entrenador = $entrenadorDAO->obtenerEntrenadorById($_POST["id"]);

    $entrenadorDTO->setId($entrenador->getId());
    $entrenadorDTO->setNombre($_POST["nombre"]);
    $entrenadorDTO->setApellidos($_POST["apellidos"]);
    $fechaNacimiento = diaMesAnioToAnioMesDia($_POST["fecha_nacimiento"]);
    $entrenadorDTO->setFechaNacimiento($fechaNacimiento);
    $fechaIngreso = diaMesAnioToAnioMesDia($_POST["fecha_ingreso"]);
    $entrenadorDTO->setFechaIngreso($fechaIngreso);
    $entrenadorDTO->setNivelEntrenador($_POST["nivel_entrenador"]);
    $entrenadorDTO->setEstatura($_POST["estatura"]);
    $entrenadorDTO->setPeso($_POST["peso"]);
    $entrenadorDTO->setUrlFoto($entrenador->getUrlFoto());
    $entrenadorDTO->setIdSucursal($entrenador->getIdSucursal());
    $entrenadorDTO->setHorario($_POST["horario"]);

    $usuarioDTO->setId($entrenador->getIdUsuario());
    $usuarioDTO->setNick($entrenador->getNick());
    $usuarioDTO->setPassword($_POST["password"]);
    $usuarioDTO->setTipo("entrenador");
    $usuarioDTO->setStatus($entrenador->getStatus());

    $usuario = $usuarioDAO->obtenerUsuarioByNick($_POST["nick"]);

    /*actualiza el nombre de usuario si este aun no existe o si es el mismo y
    ya se encuentra en la db (esto indica que no hubo cambio en el campo nick)*/
    if($usuario->getNick() == "" || $usuario->getNick() == $usuarioDTO->getNick()) {
        $usuarioDTO->setNick($_POST["nick"]);
        $usuarioDAO->actualizarUsuarioById($usuarioDTO);
        $entrenadorDAO->actualizarEntrenadorById($entrenadorDTO);
        $_POST = array();
        header('Location: index.php');
    }else {
        $nick = $_POST["nick"];
        $errorMsj = "El nombre de usuario (nick) $nick ya existe";
        $_GET['identrenador'] = $_POST["id"];
    }

}

if(!empty($_GET) && isset($_GET)) {

    $entrenadorDTO = $entrenadorDAO->obtenerEntrenadorById($_GET['identrenador']);

    $_POST["id"] = $entrenadorDTO->getId();
    $_POST["nombre"] = $entrenadorDTO->getNombre();
    $_POST["apellidos"] = $entrenadorDTO->getApellidos();
    $_POST["fecha_nacimiento"] = $entrenadorDTO->getFechaNacimiento();
    $_POST["fecha_ingreso"] = $entrenadorDTO->getFechaIngreso();
    $_POST["nivel_entrenador"] = $entrenadorDTO->getNivelEntrenador();
    $_POST["estatura"] = $entrenadorDTO->getEstatura();
    $_POST["peso"] = $entrenadorDTO->getPeso();
    $_POST["url_foto"] = $entrenadorDTO->getUrlFoto();
    $_POST["status"] = $entrenadorDTO->getStatus();
    $_POST["nick"] = $entrenadorDTO->getNick();
    $_POST["id_sucursal"] = $entrenadorDTO->getIdSucursal();
    $_POST["id_usuario"] = $entrenadorDTO->getIdUsuario();
    $_POST["horario"] = $entrenadorDTO->getHorario();

    $usuarioDTO = $usuarioDAO->obtenerUsuarioById($entrenadorDTO->getIdUsuario());

    $_POST["password"] = $usuarioDTO->getPassword();

}

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vregistro-entrenador.php';
require_once '../../includes/views/vfooter.php';