<?php

abstract class Conexao {

    const USER = "root";
    const PASS = "";

    private static $instance = null;

    private static function conectar() {

        try {
            if (self::$instance == null):
                $dsn = "mysql:host=localhost;dbname=fotos";
                self::$instance = new PDO($dsn, self::USER, self::PASS);
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
        return self::$instance;
    }

    protected static function getDB() {
        return self::conectar();
    }

}
