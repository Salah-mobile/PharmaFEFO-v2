<?php
namespace config;
use \PDO;
use \PDOException;
class connection
{
    private static ?PDO $instance = null;
    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    'mysql:host=localhost;dbname=pharmafefo_db;charset=utf8',
                    'root',
                    '',
                );
            } catch (PDOException $exception) {
                die('Erreur de connexion base de données : ' . $exception->getMessage());
            }
        }
        return self::$instance;
    }
}
