<?php

class Conexion {

    static function getConexion() {
        try {
            $opciones = [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            $conexion = new PDO("mysql:host=localhost;dbname=gimnasio;", "root", "root", $opciones);
            return $conexion;
        }catch(PDOException $e) {
            echo 'Error durante la conexion: ' . $e->getMessage();
            die();
        }
    }

}