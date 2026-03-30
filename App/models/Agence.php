<?php
declare(strict_types=1);

class Agence
{
    public ?int $id_agence;
    public string $nom;
    public string $adresse;
    public string $ville;
    public string $code_postal;

    /**
     * Récupère toutes les agences
     */
    public static function findAll(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT * FROM agence ORDER BY nom ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère une agence par ID
     */
    public static function findById(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM agence WHERE id_agence = :id');
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?: null;
    }

    /**
     * Crée une nouvelle agence
     */
    public static function create(array $data): void
    {
        $pdo = Database::getConnection();
        $sql = "INSERT INTO agence (nom, adresse, ville, code_postal)
                VALUES (:nom, :adresse, :ville, :code_postal)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom'         => $data['nom'],
            'adresse'     => $data['adresse'],
            'ville'       => $data['ville'],
            'code_postal' => $data['code_postal']
        ]);
    }

    /**
     * Met à jour une agence
     */
    public static function update(array $data): void
    {
        $pdo = Database::getConnection();
        $sql = "UPDATE agence
                SET nom = :nom,
                    adresse = :adresse,
                    ville = :ville,
                    code_postal = :code_postal
                WHERE id_agence = :id_agence";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom'         => $data['nom'],
            'adresse'     => $data['adresse'],
            'ville'       => $data['ville'],
            'code_postal' => $data['code_postal'],
            'id_agence'   => $data['id_agence']
        ]);
    }

    /**
     * Supprime une agence
     */
    public static function delete(int $id): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM agence WHERE id_agence = :id');
        $stmt->execute(['id' => $id]);
    }
}
