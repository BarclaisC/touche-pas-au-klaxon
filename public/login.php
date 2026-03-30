<?php require __DIR__ . '/../App/views/layout/header.php'; ?>

<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Connexion</h2>

    <form method="post" action="#">
        <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
    </form>
</div>

<?php require __DIR__ . '/../App/views/layout/footer.php'; ?>