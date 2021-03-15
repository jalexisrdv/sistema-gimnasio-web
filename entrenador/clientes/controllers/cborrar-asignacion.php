<?php

if(!empty($_GET) && isset($_GET)) {

    require_once '../../models/dtos/RutinaDTO.php';
    require_once '../../models/daos/RutinaDAO.php';
    require_once '../../models/dtos/ClienteDTO.php';
    require_once '../../models/daos/ClienteDAO.php';

    $rutinaDAO = new RutinaDAO();
    $clienteDAO = new ClienteDAO();

    $clienteDAO->eliminarRutinaAsignada($_GET["idcliente"], $_GET["idrutina"]);

    $cliente = $clienteDAO->obtenerClienteById($_GET["idcliente"]);
    $rutinas = $rutinaDAO->obtenerRutinasByIdEntrenador($_SESSION["id_entrenador"]);
    $rutinasCliente = $rutinaDAO->obtenerRutinasByIdCliente($cliente->getId());

    $_POST["id_cliente"] = $cliente->getId();

}


require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vasignar-rutina.php';
require_once '../../includes/views/vfooter.php';