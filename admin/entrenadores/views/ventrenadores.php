        <main class="principal-content">
            <div class="row bg-white p-3">
                <div class="col">
                    <h2 class="text-center mb-5">ENTRENADORES</h2>
                    <a href="registro-entrenador.php" class="btn btn-info active mb-3">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        REGISTRAR ENTRENADOR
                    </a>
                    <table id="mitabla" class="table table-bordered table-striped nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID ENTRENADOR</th>
                                <th>NOMBRE</th>
                                <th>APELLIDOS</th>
                                <th>FECHA INGRESO</th>
                                <th>NIVEL ENTRENADOR</th>
                                <th>NICK</th>
                                <th>ESTATUS</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($entrenadores as $entrenador): ?>
                                <tr>
                                    <td><?php echo $entrenador->getId(); ?></td>
                                    <td><?php echo $entrenador->getNombre(); ?></td>
                                    <td><?php echo $entrenador->getApellidos(); ?></td>
                                    <td><?php echo $entrenador->getFechaIngreso(); ?></td>
                                    <td><?php echo $entrenador->getNivelEntrenador(); ?></td>
                                    <td><?php echo $entrenador->getNick(); ?></td>
                                    <td><?php echo ($entrenador->getStatus()==0) ? "BAJA" : "ACTIVO" ?></td>
                                    <td>
                                        <?php $idEntrenador = $entrenador->getId(); ?>
                                        <a href="modificar-entrenador.php?identrenador=<?php echo $idEntrenador; ?>">
                                            <i class="fa fa-pencil fa-2x text-primary" aria-hidden="true"></i>
                                        </a>
                                        <a href="borrar-entrenador.php?identrenador=<?php echo $idEntrenador; ?>">
                                            <i class="fa fa-trash fa-2x text-danger" aria-hidden="true"></i>
                                        </a>
                                        <a href="restaurar-entrenador.php?identrenador=<?php echo $idEntrenador; ?>">
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