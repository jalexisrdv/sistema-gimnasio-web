        <main class="principal-content">
            <div class="row">
                <div class="col">
                    <div class="card d-flex flex-row">
                        <div class="icon align-self-center p-3">
                            <i class="fa fa-users fa-4x" aria-hidden="true"></i>
                        </div>
                        <div class="card-body">
                            <h3 class="text-right card-title"><?php echo $numeroClientes; ?></h3>
                            <p class="card-text text-right">TOTAL DE CLIENTES</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card d-flex flex-row">
                        <div class="icon align-self-center p-3">
                            <i class="fa fa-certificate fa-4x" aria-hidden="true"></i>
                        </div>
                        <div class="card-body">
                            <h3 class="text-right card-title"><?php echo $numeroEntrenadores;?></h3>
                            <p class="card-text text-right">TOTAL DE ENTRENADORES</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pagos-vencidos mt-5 bg-white p-3">
                <div class="col">
                    <h2 class="text-center mb-5">PAGOS VENCIDOS</h2>
                    <table id="mitabla" class="table table-bordered table-striped nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID PAGO</th>
                                <th>FECHA DE VENCIMIENTO</th>
                                <th>STATUS PAGO</th>
                                <th>ID CLIENTE</th>
                                <th>NOMBRE CLIENTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($pagosVencidos as $pagoVencido): ?>
                                <tr>
                                    <td><?php echo $pagoVencido->getId(); ?></td>
                                    <td><?php echo $pagoVencido->getFechaCortePago(); ?></td>
                                    <td>
                                        <?php 
                                            if($pagoVencido->getStatus() == 0) {
                                                echo "NO PAGADO";
                                            } else {
                                                echo "PAGADO";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $pagoVencido->getIdCliente(); ?></td>
                                    <td><?php echo $pagoVencido->getNombreCliente(); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>