<?php

if(isset($_GET) && !empty($_GET)) {
    require_once '../../models/daos/PagoClienteDAO.php';
    require_once '../../models/dtos/PagoClienteDTO.php';
    require_once '../../models/daos/Conexion.php';

    $pagoClienteDAO = new PagoClienteDAO();
    $pagoClienteDTO = new PagoClienteDTO();

    $pago = $pagoClienteDAO->obtenerPagoClienteById($_GET['idfactura']);

    $pagoClienteDTO->setStatus(1);
    $pagoClienteDTO->setId($pago->getId());

    $pagoClienteDAO->actualizarPagoClienteById($pagoClienteDTO);

    header('Location: index.php');
}