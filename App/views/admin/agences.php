<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-4">

    <h1 class="mb-4">Gestion des agences</h1>

    <a href="index.php?c=admin&a=dashboard" class="btn btn-secondary mb-3">
        ← Retour au tableau de bord
    </a>

    <a href="index.php?c=admin&a=createAgenceForm" class="btn btn-primary mb-3">
        + Ajouter une agence
    </a>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Code postal</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($agences as $a): ?>
                <tr>
                    <td><?= htmlspecialchars($a['id_agence']) ?></td>
                    <td><?= htmlspecialchars($a['nom']) ?></td>
                    <td><?= htmlspecialchars($a['adresse']) ?></td>
                    <td><?= htmlspecialchars($a['ville']) ?></td>
                    <td><?= htmlspecialchars($a['code_postal']) ?></td>

                    <td>
                        <a href="index.php?c=admin&a=editAgenceForm&id=<?= $a['id_agence'] ?>" 
                           class="btn btn-warning btn-sm">
                            Modifier
                        </a>

                        <a href="index.php?c=admin&a=deleteAgence&id=<?= $a['id_agence'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Supprimer cette agence ?');">
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>

