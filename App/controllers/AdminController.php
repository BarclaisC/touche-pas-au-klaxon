<?php
declare(strict_types=1);

class AdminController
{
    /**
     * Vérifie si utilisateur est admin
     */
    private function checkAdmin(): void
    {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: index.php');
            exit;
        }
    }

    /**
     * Tableau de bord administrateur
     */
    public function dashboard(): void
    {
        $this->checkAdmin();
        require __DIR__ . '/../views/admin/dashboard.php';
    }

    /**
     * Liste des utilisateurs
     */
    public function listUsers(): void
    {
        $this->checkAdmin();

        require_once __DIR__ . '/../models/Employe.php';
        $users = Employe::findAll();

        require __DIR__ . '/../views/admin/users.php';
    }

    /**
     * Liste des agences
     */
    public function listAgences(): void
    {
        $this->checkAdmin();

        require_once __DIR__ . '/../models/Agence.php';
        $agences = Agence::findAll();

        require __DIR__ . '/../views/admin/agences.php';
    }

    /**
     * Formulaire création agence
     */
    public function createAgenceForm(): void
    {
        $this->checkAdmin();
        require __DIR__ . '/../views/admin/createAgence.php';
    }

    /**
     * Création agence
     */
    public function createAgence(): void
    {
        $this->checkAdmin();

        require_once __DIR__ . '/../models/Agence.php';
        Agence::create($_POST);

        header('Location: index.php?c=admin&a=listAgences');
        exit;
    }

    /**
     * Formulaire modification agence
     */
    public function editAgenceForm(): void
    {
        $this->checkAdmin();

        require_once __DIR__ . '/../models/Agence.php';
        $agence = Agence::findById((int)$_GET['id']);

        require __DIR__ . '/../views/admin/editAgence.php';
    }

    /**
     * Modification agence
     */
    public function editAgence(): void
    {
        $this->checkAdmin();

        require_once __DIR__ . '/../models/Agence.php';
        Agence::update($_POST);

        header('Location: index.php?c=admin&a=listAgences');
        exit;
    }

    /**
     * Suppression agence
     */
    public function deleteAgence(): void
    {
        $this->checkAdmin();

        require_once __DIR__ . '/../models/Agence.php';
        Agence::delete((int)$_GET['id']);

        header('Location: index.php?c=admin&a=listAgences');
        exit;
    }

    /**
     * Liste des trajets
     */
    public function listTrajets(): void
    {
        $this->checkAdmin();

        require_once __DIR__ . '/../models/Trajet.php';
        $trajets = Trajet::findAll();

        require __DIR__ . '/../views/admin/trajets.php';
    }

    /**
     * Suppression d'un trajet
     */
    public function deleteTrajet(): void
    {
        $this->checkAdmin();

        require_once __DIR__ . '/../models/Trajet.php';
        Trajet::delete((int)$_GET['id']);

        header('Location: index.php?c=admin&a=listTrajets');
        exit;
    }
}
