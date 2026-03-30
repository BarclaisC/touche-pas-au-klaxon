<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Trajets disponibles</h1>

<?php if (isset($_SESSION['user_id']) && $_SESSION['role'] !== 'admin'): ?>
    <a href="index.php?c=trajet&a=createForm" class="btn btn-primary mb-3">
        + Créer un trajet
    </a>
<?php endif; ?>

<?php if (empty($trajets)): ?>
    <div class="alert alert-info">Aucun trajet disponible pour le moment.</div>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Départ</th>
            <th>Date</th>
            <th>Arrivée</th>
            <th>Date</th>
            <th>Places dispo</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($trajets as $t): ?>
            <tr>
                <td><?= htmlspecialchars($t['agence_depart']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($t['date_heure_depart'])) ?></td>
                <td><?= htmlspecialchars($t['agence_arrivee']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($t['date_heure_arrivee'])) ?></td>
                <td><?= htmlspecialchars($t['nb_places_dispo']) ?></td>

                <td>
                    <!-- Bouton détails -->
                    <button 
                        class="btn btn-info btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#detailsModal<?= $t['id_trajet'] ?>">
                        Détails
                    </button>

                    <!-- Modifier / Supprimer uniquement si auteur -->
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $t['id_employe']): ?>
                        <a href="index.php?c=trajet&a=editForm&id=<?= $t['id_trajet'] ?>" 
                           class="btn btn-warning btn-sm">
                            Modifier
                        </a>

                        <a href="index.php?c=trajet&a=delete&id=<?= $t['id_trajet'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Supprimer ce trajet ?');">
                            Supprimer
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- MODALES -->
<?php foreach ($trajets as $t): ?>
<div class="modal fade" id="detailsModal<?= $t['id_trajet'] ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Détails du trajet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <p><strong>Agence de départ :</strong> <?= htmlspecialchars($t['agence_depart']) ?></p>
                <p><strong>Date de départ :</strong> <?= date('d/m/Y H:i', strtotime($t['date_heure_depart'])) ?></p>

                <p><strong>Agence d'arrivée :</strong> <?= htmlspecialchars($t['agence_arrivee']) ?></p>
                <p><strong>Date d'arrivée :</strong> <?= date('d/m/Y H:i', strtotime($t['date_heure_arrivee'])) ?></p>

                <hr>

                <p><strong>Places totales :</strong> <?= $t['nb_places_total'] ?></p>
                <p><strong>Places disponibles :</strong> <?= $t['nb_places_dispo'] ?></p>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>

<?php require __DIR__ . '/../layout/footer.php'; ?>
