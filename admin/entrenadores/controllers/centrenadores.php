<?php

require_once '../../models/dtos/EntrenadorDTO.php';
require_once '../../models/daos/EntrenadorDAO.php';

$entrenadorDAO = new EntrenadorDAO();

$entrenadores = $entrenadorDAO->obtenerEntrenadores();

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/ventrenadores.php';
require_once '../../includes/views/vfooter.php';