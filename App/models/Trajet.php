<?php
declare(strict_types=1);

class Trajet
{
    public ?int $id_trajet;
    public int $id_agence_depart;
    public int $id_agence_arrivee;
    public int $id_employe;
    public string $date_heure_depart;
    public string $date_heure_arrivee;
    public int $nb_places_total;
    public int $nb_places_dispo;

    /**
     * Trajets disponibles pour les utilisateurs
     */
    public static function findDisponibles(): array
    {
        $pdo = Database::getConnection();
        $sql = "
            SELECT t.*, 
                   a1.nom AS agence_depart,
                   a2.nom AS agence_arrivee
            FROM trajet t
            JOIN agence a1 ON t.id_agence_depart = a1.id_agence
            JOIN agence a2 ON t.id_agence_arrivee = a2.id_agence
            WHERE t.nb_places_dispo > 0
              AND t.date_heure_depart > NOW()
            ORDER BY t.date_heure_depart ASC
        ";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Tous les trajets (admin)
     */
    public static function findAll(): array
    {
        $pdo = Database::getConnection();
        $sql = "
            SELECT t.*,
                   a1.nom AS agence_depart,
                   a2.nom AS agence_arrivee,
                   e.nom AS nom_employe,
                   e.prenom AS prenom_employe,
                   e.email AS email_employe
            FROM trajet t
            JOIN agence a1 ON t.id_agence_depart = a1.id_agence
            JOIN agence a2 ON t.id_agence_arrivee = a2.id_agence
            JOIN employe e ON t.id_employe = e.id_employe
            ORDER BY t.date_heure_depart DESC
        ";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupérer un trajet par ID
     */
    public static function findById(int $id): ?array
    {
        $pdo = Database::getConnection();
        $sql = "
            SELECT t.*,
                   a1.nom AS agence_depart,
                   a2.nom AS agence_arrivee
            FROM trajet t
            JOIN agence a1 ON t.id_agence_depart = a1.id_agence
            JOIN agence a2 ON t.id_agence_arrivee = a2.id_agence
            WHERE t.id_trajet = :id
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?: null;
    }

    /**
     * Créer un trajet
     */
    public static function create(array $data): bool
    {
        $pdo = Database::getConnection();
        $sql = "
            INSERT INTO trajet (
                id_agence_depart, id_agence_arrivee, id_employe,
                date_heure_depart, date_heure_arrivee,
                nb_places_total, nb_places_dispo
            ) VALUES (
                :id_agence_depart, :id_agence_arrivee, :id_employe,
                :date_heure_depart, :date_heure_arrivee,
                :nb_places_total, :nb_places_dispo
            )
        ";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'id_agence_depart'  => $data['id_agence_depart'],
            'id_agence_arrivee' => $data['id_agence_arrivee'],
            'id_employe'        => $data['id_employe'],
            'date_heure_depart' => $data['date_heure_depart'],
            'date_heure_arrivee'=> $data['date_heure_arrivee'],
            'nb_places_total'   => $data['nb_places_total'],
            'nb_places_dispo'   => $data['nb_places_dispo'],
        ]);
    }

    /**
     * Mettre à jour un trajet
     */
    public static function update(array $data): void
    {
        $pdo = Database::getConnection();
        $sql = "
            UPDATE trajet
            SET id_agence_depart  = :id_agence_depart,
                id_agence_arrivee = :id_agence_arrivee,
                date_heure_depart = :date_heure_depart,
                date_heure_arrivee= :date_heure_arrivee,
                nb_places_total   = :nb_places_total,
                nb_places_dispo   = :nb_places_dispo
            WHERE id_trajet = :id_trajet
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id_agence_depart'  => $data['id_agence_depart'],
            'id_agence_arrivee' => $data['id_agence_arrivee'],
            'date_heure_depart' => $data['date_heure_depart'],
            'date_heure_arrivee'=> $data['date_heure_arrivee'],
            'nb_places_total'   => $data['nb_places_total'],
            'nb_places_dispo'   => $data['nb_places_dispo'],
            'id_trajet'         => $data['id_trajet'],
        ]);
    }

    /**
     * Supprimer un trajet
     */
    public static function delete(int $id): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM trajet WHERE id_trajet = :id");
        $stmt->execute(['id' => $id]);
    }
}

