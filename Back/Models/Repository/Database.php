<?php

namespace Models\Repository;

use PDO;

class Database
{
    /**
     * @var PDO|null
     */
    private static $instance = null;

    /**
     * Récupérer l'instance PDO pour utiliser la BDD
     * @return PDO
     */
    public static function getPdo(): PDO
    {
        if (self::$instance === null)
        {
            self::$instance = new PDO('mysql:host=localhost;dbname=creamcode;charset=utf8', 'tarine', 'tarinecreamcode', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
        return self::$instance;
    }
}