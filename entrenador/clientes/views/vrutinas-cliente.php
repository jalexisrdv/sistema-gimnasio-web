                    <h4 class="text-center mb-5">RUTINAS DEL CLIENTE</h4>
                    <table id="mitabla" class="table table-bordered table-striped nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>TIPO</th>
                                <th>EJERCICIOS</th>
                                <th>DURACIÓN</th>
                                <th>DIA</th>
                                <th>DESCRIPCIÓN</th>
                                <th>ENTRENADOR</th>
                                <th>ACCIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rutinasCliente as $rutinaCliente): ?>
                                <tr>
                                    <td><?php echo $rutinaCliente->getTipo(); ?></td>
                                    <td><?php echo $rutinaCliente->getEjercicios(); ?></td>
                                    <td><?php echo $rutinaCliente->getDuracion(); ?></td>
                                    <td><?php echo $rutinaCliente->getDia(); ?></td>
                                    <td><?php echo $rutinaCliente->getDescripcion(); ?></td>
                                    <td>
                                        <img src="<?php echo $rutinaCliente->getUrlFotoEntrenador() ?>" alt="foto" width="50" class="mr-3 rounded-circle height-perfil img-thumbnail shadow-sm">
                                        <?php echo $rutinaCliente->getNombreEntrenador(); ?>
                                    </td>
                                    <td>
                                        <a href="borrar-asignacion.php?idcliente=<?php echo $cliente->getId(); ?>&idrutina=<?php echo $rutinaCliente->getId(); ?>">
                                            <i class="fa fa-trash fa-2x text-danger" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>