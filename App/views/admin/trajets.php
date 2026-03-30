<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-4">

    <h1 class="mb-4">Gestion des trajets</h1>

    <a href="index.php?c=admin&a=dashboard" class="btn btn-secondary mb-3">
        ← Retour au tableau de bord
    </a>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Agence départ</th>
                <th>Date départ</th>
                <th>Agence arrivée</th>
                <th>Date arrivée</th>
                <th>Conducteur</th>
                <th>Places</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($trajets as $t): ?>
                <tr>
                    <td><?= htmlspecialchars($t['id_trajet']) ?></td>

                    <td><?= htmlspecialchars($t['agence_depart']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($t['date_heure_depart'])) ?></td>

                    <td><?= htmlspecialchars($t['agence_arrivee']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($t['date_heure_arrivee'])) ?></td>

                    <td>
                        <?= htmlspecialchars($t['prenom_employe'] . ' ' . $t['nom_employe']) ?><br>
                        <small><?= htmlspecialchars($t['email_employe']) ?></small>
                    </td>

                    <td>
                        <?= htmlspecialchars($t['nb_places_dispo']) ?>
                        /
                        <?= htmlspecialchars($t['nb_places_total']) ?>
                    </td>

                    <td>
                        <a href="index.php?c=admin&a=deleteTrajet&id=<?= $t['id_trajet'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Supprimer ce trajet ?');">
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>

