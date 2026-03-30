<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Touche pas au klaxon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/main.css">
</head>

<body>
<nav class="navbar navbar-expand-lg" style="background-color:#0074c7;">
    <div class="container-fluid">

        <!-- LOGO / NOM DE L'APPLICATION -->
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <a class="navbar-brand text-white" href="index.php?c=admin&a=dashboard">
                Touche pas au klaxon
            </a>
        <?php else: ?>
            <a class="navbar-brand text-white" href="index.php">
                Touche pas au klaxon
            </a>
        <?php endif; ?>

        <div class="d-flex">

            <?php if (!isset($_SESSION['user_id'])): ?>

                <!-- UTILISATEUR NON CONNECTÉ -->
                <a href="index.php?c=auth&a=loginForm" class="btn btn-light">Connexion</a>

            <?php else: ?>

                <?php if ($_SESSION['role'] === 'admin'): ?>

                    <!-- MENU ADMIN COMPLET -->
                    <a href="index.php?c=admin&a=listUsers" class="btn btn-light me-2">Utilisateurs</a>
                    <a href="index.php?c=admin&a=listAgences" class="btn btn-light me-2">Agences</a>
                    <a href="index.php?c=admin&a=listTrajets" class="btn btn-light me-2">Trajets</a>

                <?php else: ?>

                    <!-- UTILISATEUR NORMAL : PROPOSER UN TRAJET -->
                    <a href="index.php?c=trajet&a=createForm" class="btn btn-success me-2">
                        Proposer un trajet
                    </a>

                <?php endif; ?>

                <!-- NOM UTILISATEUR -->
                <span class="text-white me-3">
                    <?= htmlspecialchars($_SESSION['prenom'] . ' ' . $_SESSION['nom']) ?>
                </span>

                <!-- DÉCONNEXION -->
                <a href="index.php?c=auth&a=logout" class="btn btn-danger">Déconnexion</a>

            <?php endif; ?>

        </div>
    </div>
</nav>

<div class="container mt-4">