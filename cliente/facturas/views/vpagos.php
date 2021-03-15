        <main class="principal-content">
            <div class="row bg-white p-3">
                <div class="col">
                    <h2 class="text-center mb-5">FACTURAS</h2>
                    <table id="mitabla" class="table table-bordered table-striped nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID PAGO</th>
                                <th>FECHA DE VENCIMIENTO</th>
                                <th>STATUS PAGO</th>
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
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>