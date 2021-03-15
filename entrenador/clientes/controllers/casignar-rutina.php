<?php

require_once '../../models/dtos/RutinaDTO.php';
require_once '../../models/daos/RutinaDAO.php';
require_once '../../models/dtos/ClienteDTO.php';
require_once '../../models/daos/ClienteDAO.php';

$exitoMsj = "";
$errorMsj = "";

if(!empty($_POST) && isset($_POST)) {

    $clienteDAO = new ClienteDAO();

    $tieneRutinaAsignada = $clienteDAO->existeRutinaAsignada($_POST["id_cliente"], $_POST["id_rutina"]);

    if(!$tieneRutinaAsignada) {
        $clienteDAO->asignarRutinaById($_POST["id_cliente"], $_POST["id_rutina"]);
        $exitoMsj = "RUTINA AGREGADA CORRECTAMENTE";
    }else {
        $errorMsj = "EL CLIENTE YA TIENE ASIGNADA LA RUTINA SELECCIONADA";
    }

    $rutinaDAO = new RutinaDAO();
    $clienteDAO = new ClienteDAO();

    $cliente = $clienteDAO->obtenerClienteById($_POST["id_cliente"]);
    $rutinas = $rutinaDAO->obtenerRutinasByIdEntrenador($_SESSION["id_entrenador"]);
    $rutinasCliente = $rutinaDAO->obtenerRutinasByIdCliente($cliente->getId());
}

if(!empty($_GET) && isset($_GET)) {

    $rutinaDAO = new RutinaDAO();
    $clienteDAO = new ClienteDAO();

    $cliente = $clienteDAO->obtenerClienteById($_GET["idcliente"]);
    $rutinas = $rutinaDAO->obtenerRutinasByIdEntrenador($_SESSION["id_entrenador"]);
    $rutinasCliente = $rutinaDAO->obtenerRutinasByIdCliente($cliente->getId());

    $_POST["id_cliente"] = $cliente->getId();

}

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vasignar-rutina.php';
require_once '../../includes/views/vfooter.php';