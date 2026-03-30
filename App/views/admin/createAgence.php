<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-4">

    <h1 class="mb-4">Créer une nouvelle agence</h1>

    <a href="index.php?c=admin&a=listAgences" class="btn btn-secondary mb-3">
        ← Retour à la liste des agences
    </a>

    <form action="index.php?c=admin&a=createAgence" method="post" class="card p-4 shadow-sm">

        <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'agence</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="code_postal" class="form-label">Code postal</label>
            <input type="text" name="code_postal" id="code_postal" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Enregistrer l'agence
        </button>

    </form>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
