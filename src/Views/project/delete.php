<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-danger text-white text-center">
            <h2>Confirmation de la suppression</h2>
        </div>
        <div class="card-body text-center">
            <p class="mb-4">Êtes-vous sûr de vouloir supprimer l'utilisateur suivant ? Cette action est irréversible.</p>
            <div class="mb-3">
                <td><?php echo htmlspecialchars($project['projectId']); ?></td>
                <td><?php echo htmlspecialchars($project['projectName']); ?></td>
                <td><?php echo htmlspecialchars($project['clientName']); ?></td>
                <td><?php echo htmlspecialchars($project['managerFirstname'] . ' ' . $project['managerName']); ?></td>
                <td><?php echo htmlspecialchars((new DateTime($project['projectStartDate']))->format('Y-m-d')); ?></td>
                <td><?php echo htmlspecialchars((new DateTime($project['projectEndDate']))->format('Y-m-d')); ?></td>
                <td><?php echo htmlspecialchars($project['stateName']); ?></td>
            </div>
        </div>
        <div class="card-footer text-center">
            <form method="POST" action="/users/delete">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($user->getId()); ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
                <a href="/project/list" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>