<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header">
            <h2>Modifier l'utilisateur</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="firstname" class="form-label"><strong>Prénom :</strong></label>
                    <input type="text" id="firstname" name="firstname" class="form-control"
                           value="<?php echo htmlspecialchars($user->getFirstname()); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Nom :</strong></label>
                    <input type="text" id="name" name="name" class="form-control"
                           value="<?php echo htmlspecialchars($user->getName()); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"><strong>Email :</strong></label>
                    <input type="email" id="email" name="email" class="form-control"
                           value="<?php echo htmlspecialchars($user->getEmail()); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Rôle :</label>
                    <select id="role" name="role" class="form-select">
                        <option value="ROLE_ADMIN">Administrateur</option>
                        <option value="ROLE_DEV">Développeur</option>
                        <option value="ROLE_CHEF">Chef de projet</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"><strong>Mot de passe (laisser vide pour ne pas changer) :</strong></label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn-create-account">Enregistrer</button>
                    <a href="/users/list" class="btn-view-profile ">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
