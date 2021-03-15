<?php

require_once '../../models/daos/EntrenadorDAO.php';
require_once '../../models/daos/PagoClienteDAO.php';
require_once '../../models/daos/ClienteDAO.php';

require_once '../../models/dtos/ClienteDTO.php';
require_once '../../models/dtos/PagoClienteDTO.php';

$clienteDAO = new ClienteDAO();
$entrenadorDAO = new EntrenadorDAO();
$pagoClienteDAO = new PagoClienteDAO();

$numeroClientes = $clienteDAO->contarClientes();
$numeroEntrenadores = $entrenadorDAO->contarEntrenadores();

$pagosVencidos = $pagoClienteDAO->obtenerPagosVencidos(1, 2);

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vdashboard.php';
require_once '../../includes/views/vfooter.php';