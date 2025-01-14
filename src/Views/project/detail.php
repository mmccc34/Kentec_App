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
                    <?php echo htmlspecialchars($project->getId()); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Etat :</strong>
                </div>
                <div class="col-md-8">
                    <?= htmlspecialchars($project->getIdState()) ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Nom du Projet :</strong>
                </div>
                <div class="col-md-8">
                    <?php echo htmlspecialchars($project->getName()); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Nom du Client :</strong>
                </div>
                <div class="col-md-8">
                    <?php echo htmlspecialchars($project->getIdClient()); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Manager :</strong>
                </div>
                <div class="col-md-8">
                    <?php echo htmlspecialchars($project->getIdManager()); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Description :</strong>
                </div>
                <div class="col-md-8">
                    <?php echo htmlspecialchars($project->getDescription()); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Date de début :</strong>
                </div>
                <div class="col-md-8">
                    <?= htmlspecialchars($project->getStartDate()->format('Y-m-d')) ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Date de fin :</strong>
                </div>
                <div class="col-md-8">
                    <?= htmlspecialchars($project->getEndDate()->format('Y-m-d')) ?>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="/project/list" class="btn btn-secondary">Retour à la liste</a>
            <a href="/project/update/<?php echo $project->getId(); ?>" class="btn btn-warning">Modifier</a>
            <a href="/project/delete/<?php echo $project->getId(); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">Supprimer</a>
        </div>
    </div>
</div>