        <main class="principal-content">
            <div class="row bg-white p-3">
                <div class="col">
                    <h2 class="text-center mb-5">FACTURAS</h2>
                    <a href="insertar-pago.php" class="btn btn-info active mb-3">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        CREAR FACTURA
                    </a>
                    <table id="mitabla" class="table table-bordered table-striped nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID PAGO</th>
                                <th>FECHA DE VENCIMIENTO</th>
                                <th>STATUS PAGO</th>
                                <th>ID CLIENTE</th>
                                <th>NOMBRE CLIENTE</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($pagos as $pago): ?>
                                <tr>
                                    <td><?php echo $pago->getId(); ?></td>
                                    <td><?php echo $pago->getFechaCortePago(); ?></td>
                                    <td>
                                        <?php 
                                            if($pago->getStatus() == 0 && $pago->getFechaCortePago() > date('Y-m-d')) {
                                                echo "NO VENCIDO";
                                            } else if($pago->getStatus() == 0) {
                                                echo "VENCIDO";
                                            }else {
                                                echo "PAGADO";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $pago->getIdCliente(); ?></td>
                                    <td><?php echo $pago->getNombreCliente(); ?></td>
                                    <td>
                                        <?php $idfactura = $pago->getId(); ?>
                                        <a href="saldar-pago.php?idfactura=<?php echo $idfactura; ?>" class="btn btn-info active mb-3">SALDAR</a>
                                        <a href="recuperar-pago.php?idfactura=<?php echo $idfactura; ?>">
                                            <i class='fa fa-undo fa-2x text-success' aria-hidden='true'></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>