<?php

$errorMsj = "";

if(!empty($_POST) && isset($_POST)) {
    require_once '../../models/dtos/EntrenadorDTO.php';
    require_once '../../models/dtos/UsuarioDTO.php';
    require_once '../../models/daos/EntrenadorDAO.php';
    require_once '../../models/daos/UsuarioDAO.php';
    require_once '../../includes/utils/fechas.php';

    $entrenadorDTO = new EntrenadorDTO();
    $usuarioDTO = new UsuarioDTO();

    $entrenadorDAO = new EntrenadorDAO();
    $usuarioDAO = new UsuarioDAO();

    $entrenadorDTO->setNombre($_POST["nombre"]);
    $entrenadorDTO->setApellidos($_POST["apellidos"]);
    $fechaNacimiento = diaMesAnioToAnioMesDia($_POST["fecha_nacimiento"]);
    $entrenadorDTO->setFechaNacimiento($fechaNacimiento);
    $fechaIngreso = diaMesAnioToAnioMesDia($_POST["fecha_ingreso"]);
    $entrenadorDTO->setFechaIngreso($fechaIngreso);
    $entrenadorDTO->setNivelEntrenador($_POST["nivel_entrenador"]);
    $entrenadorDTO->setEstatura($_POST["estatura"]);
    $entrenadorDTO->setPeso($_POST["peso"]);
    $entrenadorDTO->setUrlFoto("/");
    $entrenadorDTO->setHorario($_POST["horario"]);

    $usuarioDTO->setNick($_POST["nick"]);
    $usuarioDTO->setPassword($_POST["password"]);
    $usuarioDTO->setTipo("entrenador");
    $usuarioDTO->setStatus(1);

    $usuario = $usuarioDAO->obtenerUsuarioByNick($usuarioDTO->getNick());

    if($usuario->getNick() == "") {
        $usuarioDAO->insertarUsuario($usuarioDTO);

        $entrenadorDTO->setIdUsuario($usuarioDAO->obtenerUltimoRegistro());
        $entrenadorDTO->setIdSucursal($_SESSION["id_sucursal"]);

        $entrenadorDAO->insertarEntrenador($entrenadorDTO);

        $_POST = array();

        header('Location: index.php');
    }else {
        $nick = $_POST["nick"];
        $errorMsj = "El nombre de usuario (nick) $nick ya existe";
    }

}

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vregistro-entrenador.php';
require_once '../../includes/views/vfooter.php';