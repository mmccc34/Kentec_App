<div class="container my-5">
  <div class="card shadow-lg">
    <div class="card-header bg-black text-white text-center">
      <h2>Détails du Client</h2>
    </div>
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-md-4">
          <strong>Siren:</strong>
        </div>
        <div class="col-md-8">
          <?php echo htmlspecialchars($client->getSiren()) ;?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <strong>Naf :</strong>
        </div>
        <div class="col-md-8">
          <?php echo htmlspecialchars($client->getNaf()); ?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <strong>Staf :</strong>
        </div>
        <div class="col-md-8">
          <?php echo htmlspecialchars($client->getStaff()); ?>
        </div>
        <div class="row mb-3">
        <div class="col-md-4">
          <strong>Date de Creation :</strong>
        </div>
        <div class="col-md-8">
          <?php echo htmlspecialchars($client->getDateCreate()->format('Y-m-d')); ?>
        </div>
      </div>
    </div>
    <div class="card-footer text-center">
      <a href="/client/list" class="btn btn-secondary">Retour à la liste</a>
      <a href="/client/update?id=<?php echo $client->getId(); ?>" class="btn btn-warning">Modifier</a>
      <a href="/client/delete?id=<?php echo $client->getId(); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
    </div>
  </div>
</div>
