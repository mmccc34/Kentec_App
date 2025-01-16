<div class="container my-5">
    <h2 class="custom-card-header">Liste des Projets</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="create" id="btn-add" class="btn btn-primary w-15" style="background-color: #5a4a70;">+ Créer Ugitn Projet</a>
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
                        <td><?php echo htmlspecialchars((new DateTime($project['projectStartDate']))->format('d-m-Y')); ?></td>
                        <td><?php echo htmlspecialchars((new DateTime($project['projectEndDate']))->format('d-m-Y')); ?></td>
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