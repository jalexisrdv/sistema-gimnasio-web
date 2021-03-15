<?php

if(!empty($_POST) && isset($_POST)) {

    require_once '../../models/dtos/RutinaDTO.php';
    require_once '../../models/daos/RutinaDAO.php';

    $rutinaDAO = new RutinaDAO();
    $rutinaDTO = new RutinaDTO();

    $rutinaDTO->setTipo($_POST["tipo"]);
    $rutinaDTO->setEjercicios($_POST["ejercicios"]);
    $rutinaDTO->setDuracion($_POST["duracion"]);
    $rutinaDTO->setDia($_POST["dia"]);
    $rutinaDTO->setDescripcion($_POST["descripcion"]);
    $rutinaDTO->setIdEntrenador($_SESSION["id_entrenador"]);

    $rutinaDAO->insertarRutina($rutinaDTO);

    header('Location: index.php');

}

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vregistro-rutina.php';
require_once '../../includes/views/vfooter.php';