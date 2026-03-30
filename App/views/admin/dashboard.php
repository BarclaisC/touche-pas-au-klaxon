<?php require __DIR__ . '/../layout/header.php'; ?>

<?php 
// Sécurité supplémentaire (optionnelle)
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}
?>

<div class="container mt-4">

    <h1 class="mb-4">Tableau de bord Administrateur</h1>

    <div class="alert alert-info">
        Vous êtes connecté en tant qu’administrateur.
    </div>

    <div class="row">

        <!-- Gestion des utilisateurs -->
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h4 class="card-title">Utilisateurs</h4>
                    <p class="card-text">Voir la liste complète des employés.</p>
                    <a href="index.php?c=admin&a=listUsers" class="btn btn-primary">
                        Voir les utilisateurs
                    </a>
                </div>
            </div>
        </div>

        <!-- Gestion des agences -->
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h4 class="card-title">Agences</h4>
                    <p class="card-text">Gérer les agences : création, modification, suppression.</p>
                    <a href="index.php?c=admin&a=listAgences" class="btn btn-success">
                        Gérer les agences
                    </a>
                </div>
            </div>
        </div>

        <!-- Gestion des trajets -->
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h4 class="card-title">Trajets</h4>
                    <p class="card-text">Voir tous les trajets et les supprimer si nécessaire.</p>
                    <a href="index.php?c=admin&a=listTrajets" class="btn btn-warning">
                        Gérer les trajets
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
