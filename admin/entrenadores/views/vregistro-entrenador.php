        <main class="principal-content">
            <div class="form bg-white p-5">
                <form action="<?php echo !empty($_GET) ? "modificar-entrenador.php" : "registro-entrenador.php" ?>" method="post">
                    <h2 class="text-center mb-5">REGISTRO DE ENTRENADOR</h2>
                    <div class="row d-none">
                        <div class="col-md">
                            <input type="text" name="id" id="id" class="form-control mb-3" placeholder="id" value="<?php echo !(empty($_POST)) ? $_POST['id'] : "" ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <label for="nombre" class="mb-3">NOMBRE*</label>
                            <input required type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]+" name="nombre" id="nombre" class="form-control mb-3" placeholder="NOMBRE" value="<?php echo !(empty($_POST)) ? $_POST['nombre'] : "" ?>">
                        </div>
                        <div class="col-md">
                            <label for="apellidos" class="mb-3">APELLIDOS*</label>
                            <input required type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]+" name="apellidos" id="apellidos" class="form-control mb-3" placeholder="APELLIDOS" value="<?php echo !(empty($_POST)) ? $_POST['apellidos'] : "" ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <label for="fecha_nacimiento" class="mb-3">FECHA DE NACIMIENTO*</label>
                            <input required type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control mb-3" placeholder="FECHA DE NACIMIENTO" value="<?php echo !(empty($_POST)) ? $_POST['fecha_nacimiento'] : "" ?>">
                        </div>
                        <div class="col-md">
                            <label for="fecha_ingreso" class="mb-3">FECHA DE INGRESO*</label>
                            <input required type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control mb-3" placeholder="FECHA DE INGRESO" value="<?php echo !(empty($_POST)) ? $_POST['fecha_ingreso'] : "" ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <label for="nivel_entrenador" class="mb-3">NIVEL ENTRENADOR*</label>
                            <select name="nivel_entrenador" class="form-select mb-3" aria-label=".form-select-lg example">
                                <?php $nivel = !(empty($_POST)) ? $_POST['nivel_entrenador'] : "" ?>
                                <option value="principiante" <?php echo ($nivel == "principiante") ? "selected" : "" ?> >Principiante</option>
                                <option value="intermedio" <?php echo ($nivel == "intermedio") ? "selected" : "" ?> >Intermedio</option>
                                <option value="avanzado" <?php echo ($nivel == "avanzado") ? "selected" : "" ?> >Avanzado</option>
                            </select>
                        </div>
                        <div class="col-md">
                            <label for="horario" class="mb-3">HORARIO*</label>
                            <input required type="text" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ 0-9\.\,\:\;_\-\(\)]{600}" name="horario" id="horario" class="form-control mb-3" placeholder="HORARIO (lunes a viernes de 9 a 10)" value="<?php echo !(empty($_POST)) ? $_POST['horario'] : "" ?>" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <label for="estatura" class="mb-3">ESTATURA*</label>
                            <input required type="text" pattern="[0-9]{1,2}.?[0-9]{0,2}" name="estatura" id="estatura" class="form-control mb-3" placeholder="ESTATURA (1.69)" value="<?php echo !(empty($_POST)) ? $_POST['estatura'] : "" ?>" >
                        </div>
                        <div class="col-md">
                            <label for="peso" class="mb-3">PESO*</label>
                            <input required type="text" pattern="[0-9]{1,2}.?[0-9]{0,2}" name="peso" id="peso" class="form-control mb-3" placeholder="PESO (64.12)" value="<?php echo !(empty($_POST)) ? $_POST['peso'] : "" ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <label for="nick" class="mb-3">NICK*</label>
                            <input required type="text" pattern="[a-zA-Z]+[0-9]*" name="nick" id="nick" class="form-control mb-3" placeholder="NICK" value="<?php echo !(empty($_POST)) ? $_POST['nick'] : "" ?>" >
                        </div>
                        <div class="col-md">
                            <label for="password" class="mb-3">CONTRASEÑA*</label>
                            <input required type="password" name="password" id="password" class="form-control mb-3" placeholder="PASSWORD" value="<?php echo !(empty($_POST)) ? $_POST['password'] : "" ?>">
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-info active" value="<?php echo !empty($_GET) ? "MODIFICAR ENTRENADOR" : "REGISTRAR ENTRENADOR" ?>">
                    </div>
                    <?php
                        if(!empty($errorMsj)) {
                            echo "
                                <div class='row mt-3'>
                                    <div class='alert alert-danger'>
                                        $errorMsj
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                </form>
            </div>
        </main>