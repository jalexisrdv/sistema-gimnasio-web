<?php

require_once '../../models/daos/PagoClienteDAO.php';
require_once '../../models/dtos/PagoClienteDTO.php';

$pagoClienteDAO = new PagoClienteDAO();

$pagos = $pagoClienteDAO->obtenerPagosClientes();

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vpagos.php';
require_once '../../includes/views/vfooter.php';