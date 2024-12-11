<div class="container my-5">
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white text-center">
      <h2>Détails de l'utilisateur</h2>
    </div>
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-md-4">
          <strong>ID :</strong>
        </div>
        <div class="col-md-8">
          <?php echo htmlspecialchars($user->getId()); ?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <strong>Nom complet :</strong>
        </div>
        <div class="col-md-8">
          <?php echo htmlspecialchars($user->getFirstname() . ' ' . $user->getName()); ?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <strong>Email :</strong>
        </div>
        <div class="col-md-8">
          <?php echo htmlspecialchars($user->getEmail()); ?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-4">
          <strong>Rôle :</strong>
        </div>
        <div class="col-md-8">
          <?php echo htmlspecialchars($user->getRole()); ?>
        </div>
      </div>
    </div>
    <div class="card-footer text-center">
      <a href="/users/list" class="btn btn-secondary">Retour à la liste</a>
      <a href="/user/edit/<?php echo $user->getId(); ?>" class="btn btn-warning">Modifier</a>
      <a href="/user/delete/<?php echo $user->getId(); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
    </div>
  </div>
</div>
