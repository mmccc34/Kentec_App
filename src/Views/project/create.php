<div class="d-flex justify-content-center align-items-center min-vh-100 form-container">
    <div class="container" style="max-width: 600px;">
        <h1 class="mb-4 text-center">Créer un Nouveau Projet</h1>

        <!-- Message d'erreur -->
        <?php if (!empty($message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($message, ENT_QUOTES) ?>
            </div>
        <?php endif; ?>

        <!-- Formulaire -->
        <form action="" method="POST">
            <div class="mb-3">
                <label for="Etat" class="form-label">État du Projet</label>
                <select id="Etat" name="Etat" class="form-select" required>
                    <option value="" disabled selected>Choisir un état</option>
                    <option value="2">En cours</option>
                    <option value="3">Terminé</option>
                    <option value="1">En attente</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="Projet" class="form-label">Nom du Projet</label>
                <input type="text" id="Projet" name="Projet" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="Client" class="form-label">ID du Client</label>
                <input type="number" id="Client" name="Client" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="Manager" class="form-label">ID du Manager</label>
                <input type="number" id="Manager" name="Manager" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <textarea id="Description" name="Description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="StartDate" class="form-label">Date de Début</label>
                <input type="date" id="StartDate" name="StartDate" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="EndDate" class="form-label">Date de Fin</label>
                <input type="date" id="EndDate" name="EndDate" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Créer</button>
        </form>
    </div>
</div>