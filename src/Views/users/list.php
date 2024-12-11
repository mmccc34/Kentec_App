<div class="container my-4">
  <h2 class="text-center mb-4">Liste des utilisateurs</h2>
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    <?php foreach ($list as $user): ?>
      <div class="col">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($user->getFirstname() . ' ' . $user->getName()); ?></h5>
            <p class="card-text">
              <strong>Email :</strong> <?php echo htmlspecialchars($user->getEmail()); ?><br>
              <strong>Rôle :</strong> <?php echo htmlspecialchars($user->getRole()); ?>
            </p>
          </div>
          <div class="card-footer text-center">
            <a href="/user?id=<?php echo $user->getId(); ?>" class="btn btn-primary btn-sm">Voir Profil</a>
            <button class="btn btn-danger">Supprimer</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
