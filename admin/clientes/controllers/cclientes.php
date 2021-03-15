<?php

require_once '../../models/dtos/ClienteDTO.php';
require_once '../../models/daos/ClienteDAO.php';

$clienteDAO = new ClienteDAO();

$clientes = $clienteDAO->obtenerClientes();

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vclientes.php';
require_once '../../includes/views/vfooter.php';