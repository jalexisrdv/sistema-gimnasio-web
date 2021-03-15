<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6 background-backform">
            <div class="login d-flex align-items-center py-5">
                <div class="container ">
                    <div class="row ">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active pestañas-nav" id="administrador-tab" data-toggle="tab" href="#administrador" role="tab" aria-controls="administrador" aria-selected="true">Administrador</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link pestañas-nav" id="cliente-tab" data-toggle="tab" href="#cliente" role="tab" aria-controls="cliente" aria-selected="false">Cliente</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link pestañas-nav" id="entrenador-tab" data-toggle="tab" href="#entrenador" role="tab" aria-controls="entrenador" aria-selected="false">Entrenador</a>
                            </li>
                        </ul>
                        <div class="tab-content background-form" id="myTabContent">
                        <div class="tab-pane fade show active" id="administrador" role="tabpanel" aria-labelledby="administrador-tab">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <h3 class="login-heading mb-4">¡Bienvenido!</h3>
                                    <h4 class="login-heading mb-4">Ingresa usando tu nick (nombre de usuario) y tu contraseña</h4>
                                    <form action="index.php" method="POST">
                                    <label for="nick">Nick:</label>
                                        <div class="form-label-group">
                                            <input type="text" id="nick" name="nick" class="form-control" placeholder="Nick:" required autofocus>
                                            
                                        </div>

                                        <label for="password">Contraseña:</label>
                                        <div class="form-label-group">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                                        </div>

                                        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="btnLogin">Ingresar</button>
                                        <div class="text-center">
                                            <a class="small" href="#">¿Olvidaste tu contraseña?</a></div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cliente" role="tabpanel" aria-labelledby="cliente-tab">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <h3 class="login-heading mb-4">¡Bienvenido!</h3>
                                    <h4 class="login-heading mb-4">Ingresa usando tu nick (nombre de usuario) y tu contraseña</h4>
                                    <form action="index.php" method="POST">
                                    <label for="nick">Nick:</label>
                                        <div class="form-label-group">
                                            <input type="text" id="nick" name="nick" class="form-control" placeholder="Nick:" required autofocus>
                                            
                                        </div>

                                        <label for="password">Contraseña:</label>
                                        <div class="form-label-group">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                                        </div>

                                        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="btnLogin">Ingresar</button>
                                        <div class="text-center">
                                            <a class="small" href="#">¿Olvidaste tu contraseña?</a></div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="entrenador" role="tabpanel" aria-labelledby="entrenador-tab">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <h3 class="login-heading mb-4">¡Bienvenido!</h3>
                                    <h4 class="login-heading mb-4">Ingresa usando tu nick (nombre de usuario) y tu contraseña</h4>
                                    <form action="index.php" method="POST">
                                    <label for="nick">Nick:</label>
                                        <div class="form-label-group">
                                            <input type="text" id="nick" name="nick" class="form-control" placeholder="Nick:" required autofocus>
                                            
                                        </div>

                                        <label for="password">Contraseña:</label>
                                        <div class="form-label-group">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                                        </div>

                                        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="btnLogin">Ingresar</button>
                                        <div class="text-center">
                                            <a class="small" href="#">¿Olvidaste tu contraseña?</a></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>