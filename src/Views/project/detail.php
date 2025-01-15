<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-black text-white text-center">
            <h2>Détails du Projet</h2>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>N°:</strong>
                </div>
                <div class="col-md-8">
                    <?= htmlspecialchars($project['projectId']); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Etat :</strong>
                </div>
                <div class="col-md-8">
                    <?= htmlspecialchars($project['stateName']); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Nom du Projet :</strong>
                </div>
                <div class="col-md-8">
                    <?= htmlspecialchars($project['projectName']); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Nom du Client :</strong>
                </div>
                <div class="col-md-8">
                    <?= htmlspecialchars($project['clientName']); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Manager :</strong>
                </div>
                <div class="col-md-8">
                    <?= htmlspecialchars($project['managerName'] . " " . $project['managerFirstname']); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Description :</strong>
                </div>
                <div class="col-md-8">
                    <?= htmlspecialchars($project['projectDescription']); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Date de début :</strong>
                </div>
                <div class="col-md-8">
                    <?= htmlspecialchars($project['projectStartDate']); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Date de fin :</strong>
                </div>
                <div class="col-md-8">
                    <?= htmlspecialchars($project['projectEndDate']); ?>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="/project/list" class="btn btn-secondary">Retour à la liste</a>
            <a href="/project/update/<?= $project['projectId']; ?>" class="btn btn-warning">Modifier</a>
            <a href="/project/delete/<?= $project['projectId']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">Supprimer</a>
        </div>
    </div>
</div>