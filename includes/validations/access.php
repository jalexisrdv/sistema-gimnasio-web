<?php

/*redirecciona a la seccion segun el tipo de usuario logueado,
esta funcion se usa para validar que los usuarios solo
accedan a sus secciones correspondientes*/
function validarAcceso($tipoUsuario, $nivelDirectorio) {
    switch($tipoUsuario) {
        case "administrador":
            $nivelDirectorio .= "admin/";
            header("Location: $nivelDirectorio");
        break;
        case "cliente":
            $nivelDirectorio .= "cliente/";
            header("Location: $nivelDirectorio");
        break;
        case "entrenador":
            $nivelDirectorio .= "entrenador/";
            header("Location: $nivelDirectorio");
        break;
    }
}