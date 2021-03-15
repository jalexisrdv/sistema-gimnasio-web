
<?php

require_once '../../models/dtos/RutinaDTO.php';
require_once '../../models/daos/RutinaDAO.php';

if(!empty($_POST) && isset($_POST)) {

    $rutinaDAO = new RutinaDAO();
    $rutinaDTO = new RutinaDTO();

    $rutinaDTO->setId($_POST["id"]);
    $rutinaDTO->setTipo($_POST["tipo"]);
    $rutinaDTO->setEjercicios($_POST["ejercicios"]);
    $rutinaDTO->setDuracion($_POST["duracion"]);
    $rutinaDTO->setDia($_POST["dia"]);
    $rutinaDTO->setDescripcion($_POST["descripcion"]);
    $rutinaDTO->setIdEntrenador($_SESSION["id_entrenador"]);

    $rutinaDAO->actualizarRutinaById($rutinaDTO);

    header('Location: index.php');

}

if(!empty($_GET) && isset($_GET)) {

    $rutinaDAO = new RutinaDAO();

    $rutinaDTO = $rutinaDAO->obtenerRutinaById($_GET["idrutina"]);

    $_POST["id"] = $rutinaDTO->getId();
    $_POST["tipo"] = $rutinaDTO->getTipo();
    $_POST["ejercicios"] = $rutinaDTO->getEjercicios();
    $_POST["duracion"] = $rutinaDTO->getDuracion();
    $_POST["dia"] = $rutinaDTO->getDia();
    $_POST["descripcion"] = $rutinaDTO->getDescripcion();

}

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vregistro-rutina.php';
require_once '../../includes/views/vfooter.php';