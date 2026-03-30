<?php
declare(strict_types=1);

class AuthController
{
    /**
     * Affiche le formulaire de connexion
     */
    public function loginForm(): void
    {
        require __DIR__ . '/../views/auth/login.php';
    }

    /**
     * Connexion utilisateur
     */
    public function login(): void
    {
        if (empty($_POST['email']) || empty($_POST['mot_de_passe'])) {
            $error = "Veuillez remplir tous les champs.";
            require __DIR__ . '/../views/auth/login.php';
            return;
        }

        $email = $_POST['email'];
        $password = $_POST['mot_de_passe'];

        // Récupération de l'utilisateur
        $user = Employe::findByEmail($email);

        if (!$user) {
            $error = "Email incorrect.";
            require __DIR__ . '/../views/auth/login.php';
            return;
        }

        // Vérification du mot de passe
        if (!password_verify($password, $user->motDePasse)) {
            $error = "Mot de passe incorrect.";
            require __DIR__ . '/../views/auth/login.php';
            return;
        }

        // Connexion OK → création de la session
        $_SESSION['user_id'] = $user->id;
        $_SESSION['role']    = $user->role;
        $_SESSION['nom']     = $user->nom;
        $_SESSION['prenom']  = $user->prenom;

        // Redirection selon le rôle
        if ($user->role === 'admin') {
            header('Location: index.php?c=admin&a=dashboard');
        } else {
            header('Location: index.php?c=trajet&a=index');
        }
        exit;
    }

    /**
     * Déconnexion
     */
    public function logout(): void
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
