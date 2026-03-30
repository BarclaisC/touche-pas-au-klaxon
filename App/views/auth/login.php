<h2>Connexion</h2>

<form method="post" action="index.php?c=auth&a=login">
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <input type="password" name="mot_de_passe" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

