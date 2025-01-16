<div class="d-flex justify-content-center align-items-center min-vh-100 form-container">
    <div class="container" style="max-width: 750px;">
    <h1 class="custom-card-header">Créer un Projet</h1>

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
                    <option value="1">En attente</option>
                    <option value="2">En cours</option>
                    <option value="3">Terminé</option>
                    
                </select>
            </div>

            <div class="mb-3">
                <label for="Projet" class="form-label">Nom du Projet</label>
                <input type="text" id="Projet" name="Projet" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="Client" class="form-label">Client :</label>
                <select name="Client" id="Client" class="form-select">
                    <?php foreach ($clients as $client): ?>
                        <option value="<?php echo htmlspecialchars($client->getId()); ?>">
                            <?php echo htmlspecialchars($client->getName()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="Manager" class="form-label">Manager :</label>
                <select name="Manager" id="Manager" class="form-select">
                    <?php foreach ($managers as $manager): ?>
                        <option value="<?php echo htmlspecialchars($manager->getId()); ?>">
                            <?php echo htmlspecialchars($manager->getName()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
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

            <button type="submit" class="btn btn-primary w-100" id="btn-add" style="margin: 10px">Créer</button>
        </form>
    </div>
</div>