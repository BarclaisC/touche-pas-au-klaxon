<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-4">

    <h1 class="mb-4">Liste des utilisateurs</h1>

    <a href="index.php?c=admin&a=dashboard" class="btn btn-secondary mb-3">
        ← Retour au tableau de bord
    </a>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Rôle</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= $u['id_employe'] ?></td>
                    <td><?= $u['nom'] ?></td>
                    <td><?= $u['prenom'] ?></td>
                    <td><?= $u['email'] ?></td>
                    <td><?= $u['telephone'] ?></td>
                    <td>
                        <?php if ($u['role'] === 'admin'): ?>
                            <span class="badge bg-danger">Admin</span>
                        <?php else: ?>
                            <span class="badge bg-primary">Utilisateur</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
