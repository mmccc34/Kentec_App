<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-black text-white text-center">
            <h2>Projet à Réactualiser</h2>
        </div>
        <div class="card-body">
            <!-- Formulaire -->
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="Etat" class="form-label">État du Projet</label>
                    <select id="Etat" name="Etat" class="form-select" required>
                        <option value="" disabled <?php echo $project->getIdState() === null ? 'selected' : ''; ?>>Choisir un état</option>
                        <option value="2" <?php echo $project->getIdState() == 2 ? 'selected' : ''; ?>>En cours</option>
                        <option value="3" <?php echo $project->getIdState() == 3 ? 'selected' : ''; ?>>Terminé</option>
                        <option value="1" <?php echo $project->getIdState() == 1 ? 'selected' : ''; ?>>En attente</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Projet" class="form-label">Nom du Projet</label>
                    <input type="text" id="Projet" name="Projet" value="<td><?php echo htmlspecialchars($project['projectName']); ?>" class="form-control" required>
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
                    <label for="Description" class="form-label">Description</label>
                    <textarea id="Description" name="Description" class="form-control" rows="4" required><?php echo htmlspecialchars($project->getDescription()); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="StartDate" class="form-label">Date de Début</label>
                    <input
                        id="StartDate"
                        name="StartDate"
                        type="date"
                        value="<?php echo $project->getStartDate() instanceof DateTime ? htmlspecialchars($project->getStartDate()->format('Y-m-d')) : ''; ?>"
                        class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label for="EndDate" class="form-label">Date de Fin</label>
                    <input
                        id="EndDate"
                        name="EndDate"
                        type="date"
                        value="<?php echo $project->getEndDate() instanceof DateTime ? htmlspecialchars($project->getEndDate()->format('Y-m-d')) : ''; ?>"
                        class="form-control"
                        required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Modifier</button>
            </form>
        </div>
    </div>
</div>