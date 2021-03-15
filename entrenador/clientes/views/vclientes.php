        <main class="principal-content">
            <div class="row bg-white p-3">
                <div class="col">
                    <h2 class="text-center mb-5">CLIENTES</h2>
                    <table id="mitabla" class="table table-bordered table-striped nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID CLIENTE</th>
                                <th>NOMBRE</th>
                                <th>FECHA INGRESO</th>
                                <th>ESTATUS</th>
                                <th>ASIGNAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($clientes as $cliente): ?>
                                <tr>
                                    <td><?php echo $cliente->getId(); ?></td>
                                    <td>
                                        <img src="<?php echo $cliente->getUrlFoto() ?>" alt="foto" width="50" class="mr-3 rounded-circle height-perfil img-thumbnail shadow-sm">
                                        <?php echo $cliente->getNombre(); ?>
                                    </td>
                                    <td><?php echo $cliente->getFechaIngreso(); ?></td>
                                    <td><?php echo ($cliente->getStatus()==0) ? "BAJA" : "ACTIVO" ?></td>
                                    <td>
                                        <a href="asignar-rutina.php?idcliente=<?php echo $cliente->getId(); ?>" class="">
                                            <i class="fa fa-address-book-o" aria-hidden="true"></i>
                                            RUTINA
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>