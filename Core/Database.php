<?php
declare(strict_types=1);

/**
 * Classe de connexion à la base de données.
 */
class Database
{
    /**
     * Retourne une instance PDO.
     *
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        static $pdo = null;

        if ($pdo === null) {

            // IMPORTANT : ajout du port 3307
            $dsn = 'mysql:host=' . DB_HOST . ';port=3307;dbname=' . DB_NAME . ';charset=utf8mb4';

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];

            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        }

        return $pdo;
    }
}