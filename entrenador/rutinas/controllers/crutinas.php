<?php

require_once '../../models/daos/RutinaDAO.php';
require_once '../../models/dtos/RutinaDTO.php';

$rutinaDAO = new RutinaDAO();

$rutinas = $rutinaDAO->obtenerRutinasByIdEntrenador($_SESSION["id_entrenador"]);

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vrutinas.php';
require_once '../../includes/views/vfooter.php';