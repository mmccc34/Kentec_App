<div class="container my-5">
    <h2 class="text-center mb-4">Liste des Projets</h2>

    <!-- Tableau responsive Bootstrap -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Client</th>
                    <th>Manager</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Etat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($project as $projects): ?>
                    <tr>
                        <!-- ID caché -->
                        <td>
                            <?php echo htmlspecialchars($projects->getId()); ?>
                        </td>

                        <!-- Champ Nom -->
                        <td>
                            <?php echo htmlspecialchars($projects->getName()); ?>
                        </td>

                        <!-- Champ Client -->
                        <td>
                            <?php echo htmlspecialchars($projects->getIdClient()); ?>
                        </td>

                        <!-- Champ Manager -->
                        <td>
                            <?php echo htmlspecialchars($projects->getIdManager()); ?>
                        </td>

                        <!-- Date de début-->
                        <td>
                            <?= htmlspecialchars($projects->getStartDate()->format('Y-m-d')) ?> <br>

                        </td>
                        <!-- Date de fin-->
                        <td>
                            <?= htmlspecialchars($projects->getEndDate()->format('Y-m-d')) ?> <br>

                        </td>
                        <!-- Champ Etat -->
                        <td>
                            <?php echo htmlspecialchars($projects->getIdState()); ?>
                        </td>
                        <td>
                            <a href="/project?id=<?php echo $projects->getId(); ?>" class="btn btn-dark btn-sm">Voir Projet</a>

                        </td>

                        </form>

                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>