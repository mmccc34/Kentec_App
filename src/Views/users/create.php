<form method="POST" action="/users/create" class="container mt-5 p-4 shadow rounded bg-light" enctype="multipart/form-data">
    <h2 class="custom-card-header">Créer un utilisateur</h2>

    <div class="mb-3">
        <label for="name" class="form-label">Nom :</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Entrez le nom" required>
    </div>

    <div class="mb-3">
        <label for="firstname" class="form-label">Prénom :</label>
        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Entrez le prénom" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email :</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Entrez l'email" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe :</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Entrez le mot de passe" required>
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Rôle :</label>
        <select id="role" name="role" class="form-select">
            <option value="ROLE_ADMIN">Administrateur</option>
            <option value="ROLE_DEV">Développeur</option>
            <option value="ROLE_CHEF">Chef de projet</option>
        </select>
    </div>

    <!-- Nouveau champ pour télécharger une photo -->
    <div class="mb-3">
        <label for="photo" class="form-label">Photo de profil :</label>
        <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
    </div>

    <div class="text-center">
        <button type="submit" class="btn-create-account">Créer</button>
    </div>
</form>
