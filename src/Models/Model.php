<?php

namespace CCoworker\CCoworker\Models;

use PDO;
use PDOException;

abstract class Model {

    protected object $_db;
    private static ?PDO $_dbInstance = null;

    public function __construct(){

        $DB_HOST = "localhost";
        $DB_NAME = "ccoworker";
        $DB_USER = "root";
        $DB_PASS = "";

        // Récupère ou crée la connexion (singleton)
        if (self::$_dbInstance === null) {
            try{
                self::$_dbInstance = new PDO(
                    "mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME . "",
                    $DB_USER,
                    $DB_PASS,
                    array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
                );
                self::$_dbInstance->exec("SET CHARACTER SET utf8");
                self::$_dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Échec : " . $e->getMessage();
            }
        }

        // Assigne la connexion
        $this->_db = self::$_dbInstance;
    }
}