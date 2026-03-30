<?php
declare(strict_types=1);

class Employe
{
    public ?int $id;
    public string $nom;
    public string $prenom;
    public string $email;
    public string $telephone;
    public string $motDePasse;
    public string $role;

    /**
     * Récupère un employé par email (connexion)
     */
    public static function findByEmail(string $email): ?Employe
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM employe WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }

        $emp = new self();
        $emp->id         = (int)$data['id_employe'];
        $emp->nom        = $data['nom'];
        $emp->prenom     = $data['prenom'];
        $emp->email      = $data['email'];
        $emp->telephone  = $data['telephone'];
        $emp->motDePasse = $data['mot_de_passe'];
        $emp->role       = $data['role'];

        return $emp;
    }

    /**
     * Récupère tous les employés (pour l'admin)
     */
    public static function findAll(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT * FROM employe ORDER BY nom');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère un employé par ID (optionnel)
     */
    public static function findById(int $id): ?array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM employe WHERE id_employe = :id');
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?: null;
    }
}
