<div class="container my-5">
    <h2 class="text-center mb-4">Liste des Projets</h2><br>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="create" id="btn-add" class="btn btn-primary w-15">+ Créer un Projet</a>
    </div>

    <!-- Tableau responsive Bootstrap -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead id="table-nav">
                <tr>
                    <th>N°</th>
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
                <?php foreach ($projects as $project): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($project['projectId']); ?></td>
                        <td><?php echo htmlspecialchars($project['projectName']); ?></td>
                        <td><?php echo htmlspecialchars($project['clientName']); ?></td>
                        <td><?php echo htmlspecialchars($project['managerFirstname'] . ' ' . $project['managerName']); ?></td>
                        <td><?php echo htmlspecialchars((new DateTime($project['projectStartDate']))->format('Y-m-d')); ?></td>
                        <td><?php echo htmlspecialchars((new DateTime($project['projectEndDate']))->format('Y-m-d')); ?></td>
                        <td><?php echo htmlspecialchars($project['stateName']); ?></td>
                        <td>
                            <a href="/project/<?php echo $project['projectId']; ?>" id="btn-add" class="btn btn-dark btn-sm">Voir Projet</a>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>