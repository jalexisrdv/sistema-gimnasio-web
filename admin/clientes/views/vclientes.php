        <main class="principal-content">
            <div class="row bg-white p-3">
                <div class="col">
                    <h2 class="text-center mb-5">CLIENTES</h2>
                    <a href="registro-cliente.php" class="btn btn-info active mb-3">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        REGISTRAR CLIENTE
                    </a>
                    <table id="mitabla" class="table table-bordered table-striped nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID CLIENTE</th>
                                <th>NOMBRE</th>
                                <th>APELLIDOS</th>
                                <th>EMAIL</th>
                                <th>FECHA INGRESO</th>
                                <th>NICK</th>
                                <th>ESTATUS</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($clientes as $cliente): ?>
                                <tr>
                                    <td><?php echo $cliente->getId(); ?></td>
                                    <td><?php echo $cliente->getNombre(); ?></td>
                                    <td><?php echo $cliente->getApellidos(); ?></td>
                                    <td><?php echo $cliente->getEmail(); ?></td>
                                    <td><?php echo $cliente->getFechaIngreso(); ?></td>
                                    <td><?php echo $cliente->getNick(); ?></td>
                                    <td><?php echo ($cliente->getStatus()==0) ? "BAJA" : "ACTIVO" ?></td>
                                    <td>
                                        <?php $idCliente = $cliente->getId(); ?>
                                        <a href="modificar-cliente.php?idcliente=<?php echo $idCliente; ?>">
                                            <i class="fa fa-pencil fa-2x text-primary" aria-hidden="true"></i>
                                        </a>
                                        <a href="borrar-cliente.php?idcliente=<?php echo $idCliente; ?>">
                                            <i class="fa fa-trash fa-2x text-danger" aria-hidden="true"></i>
                                        </a>
                                        <a href="restaurar-cliente.php?idcliente=<?php echo $idCliente; ?>">
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