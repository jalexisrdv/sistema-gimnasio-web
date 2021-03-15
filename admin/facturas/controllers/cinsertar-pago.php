<?php

if(isset($_POST) && !empty($_POST)) {
    require_once '../../models/daos/PagoClienteDAO.php';
    require_once '../../models/dtos/PagoClienteDTO.php';

    $pagoClienteDAO = new PagoClienteDAO();
    $pagoClienteDTO = new PagoClienteDTO();

    $pagoClienteDTO->setFechaCortePago($_POST['fecha_corte_pago']);
    $pagoClienteDTO->setFechaPagoRealizado($_POST['fecha_pago_realizado']);
    $pagoClienteDTO->setIdCliente($_POST['id_cliente']);
    $pagoClienteDTO->setIdSucursal(1);
    $pagoClienteDTO->setStatus(0);
    $pagoClienteDAO->insertarPagoCliente($pagoClienteDTO);
    header('Location: index.php');
    $_POST = null;
}

$fechaActual = date('Y-m-d');

require_once '../../includes/views/vheader.php';
require_once '../../includes/views/vnavbar.php';
require_once 'views/vinsertar-pago.php';
require_once '../../includes/views/vfooter.php';