        <main class="principal-content">
            <div class="row bg-white p-3">
                <div class="col">
                    <h2 class="text-center mb-5">RUTINAS</h2>
                    <a href="registro-rutina.php" class="btn btn-info active mb-3">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        REGISTRAR RUTINA
                    </a>
                    <table id="mitabla" class="table table-bordered table-striped nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>TIPO</th>
                                <th>EJERCICIOS</th>
                                <th>DURACIÓN</th>
                                <th>DIA</th>
                                <th>DESCRIPCIÓN</th>
                                <th>ACCIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rutinas as $rutina): ?>
                                <tr>
                                    <td><?php echo $rutina->getTipo(); ?></td>
                                    <td><?php echo $rutina->getEjercicios(); ?></td>
                                    <td><?php echo $rutina->getDuracion(); ?></td>
                                    <td><?php echo $rutina->getDia(); ?></td>
                                    <td><?php echo $rutina->getDescripcion(); ?></td>
                                    <td>
                                        <a href="modificar-rutina.php?idrutina=<?php echo $rutina->getId(); ?>">
                                            <i class="fa fa-pencil fa-2x text-primary" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>