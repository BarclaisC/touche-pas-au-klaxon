<?php require __DIR__ . '/../layout/header.php'; ?>

<h2 class="mb-4">Créer un trajet</h2>

<?php if (isset($error)): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>

<form method="post" action="index.php?c=trajet&a=create">

    <div class="mb-3">
        <label class="form-label">Agence de départ</label>
        <select name="id_agence_depart" class="form-select" required>
            <?php foreach ($agences as $a): ?>
                <option value="<?= $a['id_agence'] ?>">
                    <?= htmlspecialchars($a['nom'] . ' (' . $a['ville'] . ')') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Agence d'arrivée</label>
        <select name="id_agence_arrivee" class="form-select" required>
            <?php foreach ($agences as $a): ?>
                <option value="<?= $a['id_agence'] ?>">
                    <?= htmlspecialchars($a['nom'] . ' (' . $a['ville'] . ')') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Date et heure de départ</label>
        <input type="datetime-local" name="date_heure_depart" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Date et heure d'arrivée</label>
        <input type="datetime-local" name="date_heure_arrivee" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre total de places</label>
        <input type="number" name="nb_places_total" class="form-control" min="1" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre de places disponibles</label>
        <input type="number" name="nb_places_dispo" class="form-control" min="0" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Personne à contacter</label>
        <input type="text" class="form-control"
               value="<?= htmlspecialchars($_SESSION['prenom'] . ' ' . $_SESSION['nom']) ?>"
               disabled>
    </div>

    <button type="submit" class="btn btn-primary">Créer le trajet</button>

</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
