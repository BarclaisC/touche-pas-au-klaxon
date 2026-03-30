<?php
declare(strict_types=1);

class TrajetController
{
    /**
     * Page d'accueil : liste des trajets disponibles
     */
    public function index(): void
    {
        $trajets = Trajet::findDisponibles();
        require __DIR__ . '/../views/trajet/index.php';
    }

    /**
     * Formulaire de création d'un trajet
     */
    public function createForm(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?c=auth&a=loginForm');
            exit;
        }

        $agences = Agence::findAll();
        require __DIR__ . '/../views/trajet/create.php';
    }

    /**
     * Création d'un trajet
     */
    public function create(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?c=auth&a=loginForm');
            exit;
        }

        // --- CONTRÔLES DE COHÉRENCE OBLIGATOIRES ---

        // Agences différentes
        if ($_POST['id_agence_depart'] === $_POST['id_agence_arrivee']) {
            $error = "L'agence de départ et d'arrivée doivent être différentes.";
            $agences = Agence::findAll();
            require __DIR__ . '/../views/trajet/create.php';
            return;
        }

        // Dates cohérentes
        if (strtotime($_POST['date_heure_arrivee']) <= strtotime($_POST['date_heure_depart'])) {
            $error = "La date d'arrivée doit être postérieure à la date de départ.";
            $agences = Agence::findAll();
            require __DIR__ . '/../views/trajet/create.php';
            return;
        }

        // Places cohérentes
        if ((int)$_POST['nb_places_dispo'] > (int)$_POST['nb_places_total']) {
            $error = "Les places disponibles ne peuvent pas dépasser les places totales.";
            $agences = Agence::findAll();
            require __DIR__ . '/../views/trajet/create.php';
            return;
        }

        // --- INSERTION ---

        $data = [
            'id_agence_depart'  => $_POST['id_agence_depart'],
            'id_agence_arrivee' => $_POST['id_agence_arrivee'],
            'date_heure_depart' => $_POST['date_heure_depart'],
            'date_heure_arrivee'=> $_POST['date_heure_arrivee'],
            'nb_places_total'   => $_POST['nb_places_total'],
            'nb_places_dispo'   => $_POST['nb_places_dispo'],
            'id_employe'        => $_SESSION['user_id'],
        ];

        Trajet::create($data);

        header('Location: index.php?c=trajet&a=index');
        exit;
    }

    /**
     * Formulaire de modification d'un trajet
     */
    public function editForm(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?c=auth&a=loginForm');
            exit;
        }

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=trajet&a=index');
            exit;
        }

        $trajet = Trajet::findById((int)$_GET['id']);

        // Vérification auteur
        if ($trajet['id_employe'] !== $_SESSION['user_id']) {
            header('Location: index.php?c=trajet&a=index');
            exit;
        }

        $agences = Agence::findAll();
        require __DIR__ . '/../views/trajet/edit.php';
    }

    /**
     * Modification d'un trajet
     */
    public function edit(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?c=auth&a=loginForm');
            exit;
        }

        $trajet = Trajet::findById((int)$_POST['id']);

        // Vérification auteur
        if ($trajet['id_employe'] !== $_SESSION['user_id']) {
            header('Location: index.php?c=trajet&a=index');
            exit;
        }

        // --- CONTRÔLES DE COHÉRENCE ---

        if ($_POST['id_agence_depart'] === $_POST['id_agence_arrivee']) {
            $error = "L'agence de départ et d'arrivée doivent être différentes.";
            $agences = Agence::findAll();
            require __DIR__ . '/../views/trajet/edit.php';
            return;
        }

        if (strtotime($_POST['date_heure_arrivee']) <= strtotime($_POST['date_heure_depart'])) {
            $error = "La date d'arrivée doit être postérieure à la date de départ.";
            $agences = Agence::findAll();
            require __DIR__ . '/../views/trajet/edit.php';
            return;
        }

        if ((int)$_POST['nb_places_dispo'] > (int)$_POST['nb_places_total']) {
            $error = "Les places disponibles ne peuvent pas dépasser les places totales.";
            $agences = Agence::findAll();
            require __DIR__ . '/../views/trajet/edit.php';
            return;
        }

        // --- MISE À JOUR ---

        $data = [
            'id_trajet'         => $_POST['id'],
            'id_agence_depart'  => $_POST['id_agence_depart'],
            'id_agence_arrivee' => $_POST['id_agence_arrivee'],
            'date_heure_depart' => $_POST['date_heure_depart'],
            'date_heure_arrivee'=> $_POST['date_heure_arrivee'],
            'nb_places_total'   => $_POST['nb_places_total'],
            'nb_places_dispo'   => $_POST['nb_places_dispo'],
        ];

        Trajet::update($data);

        header('Location: index.php?c=trajet&a=index');
        exit;
    }

    /**
     * Suppression d'un trajet
     */
    public function delete(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?c=auth&a=loginForm');
            exit;
        }

        if (isset($_GET['id'])) {

            $trajet = Trajet::findById((int)$_GET['id']);

            // Vérification auteur
            if ($trajet['id_employe'] !== $_SESSION['user_id']) {
                header('Location: index.php?c=trajet&a=index');
                exit;
            }

            Trajet::delete((int)$_GET['id']);
        }

        header('Location: index.php?c=trajet&a=index');
        exit;
    }
}
