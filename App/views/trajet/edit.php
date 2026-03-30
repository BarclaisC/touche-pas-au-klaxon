<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Modifier un trajet</h1>

<?php if (isset($error)): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>

<form method="post" action="index.php?c=trajet&a=edit">

    <input type="hidden" name="id" value="<?= $trajet['id_trajet'] ?>">

    <div class="row">
        <div class="col-md-6">

            <h4>Informations du trajet</h4>

            <div class="mb-3">
                <label class="form-label">Agence de départ</label>
                <select name="id_agence_depart" class="form-select" required>
                    <?php foreach ($agences as $a): ?>
                        <option value="<?= $a['id_agence'] ?>"
                            <?= $a['id_agence'] == $trajet['id_agence_depart'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($a['nom'] . ' (' . $a['ville'] . ')') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Agence d'arrivée</label>
                <select name="id_agence_arrivee" class="form-select" required>
                    <?php foreach ($agences as $a): ?>
                        <option value="<?= $a['id_agence'] ?>"
                            <?= $a['id_agence'] == $trajet['id_agence_arrivee'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($a['nom'] . ' (' . $a['ville'] . ')') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Date et heure de départ</label>
                <input type="datetime-local" name="date_heure_depart" class="form-control"
                       value="<?= date('Y-m-d\TH:i', strtotime($trajet['date_heure_depart'])) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Date et heure d'arrivée</label>
                <input type="datetime-local" name="date_heure_arrivee" class="form-control"
                       value="<?= date('Y-m-d\TH:i', strtotime($trajet['date_heure_arrivee'])) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre total de places</label>
                <input type="number" name="nb_places_total" class="form-control"
                       value="<?= $trajet['nb_places_total'] ?>" min="1" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre de places disponibles</label>
                <input type="number" name="nb_places_dispo" class="form-control"
                       value="<?= $trajet['nb_places_dispo'] ?>" min="0" required>
            </div>

        </div>

        <div class="col-md-6">

            <h4>Informations du conducteur</h4>

            <div class="alert alert-info">
                Ces informations ne sont pas modifiables.
            </div>

            <div class="mb-3">
                <label class="form-label">Nom complet</label>
                <input type="text" class="form-control"
                       value="<?= htmlspecialchars($_SESSION['prenom'] . ' ' . $_SESSION['nom']) ?>" disabled>
            </div>

        </div>
    </div>

    <button type="submit" class="btn btn-success mt-3">Enregistrer les modifications</button>
    <a href="index.php?c=trajet&a=index" class="btn btn-secondary mt-3">Annuler</a>

</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>