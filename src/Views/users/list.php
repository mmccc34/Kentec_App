<div class="container my-4">
    <h2 class="custom-card-header">Liste des utilisateurs</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

        <?php foreach ($list as $user): ?>
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- Affichage de la photo de profil -->
                        <div class="text-center mb-3">
                            <?php if ($user->getPhotoFilename()): ?>
                                <img src="/build/images/<?php echo htmlspecialchars($user->getPhotoFilename()); ?>" alt="Photo de <?php echo htmlspecialchars($user->getFirstname() . ' ' . $user->getName()); ?>" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                            <?php else: ?>
                                <img src="/build/images/default-avatar.png" alt="Photo par défaut" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                            <?php endif; ?>
                        </div>

                        <h5 class="card-title"><?php echo htmlspecialchars($user->getFirstname() . ' ' . $user->getName()); ?></h5>
                        <p class="card-text">
                            <strong>Email :</strong> <?php echo htmlspecialchars($user->getEmail()); ?><br>
                            <strong>Rôle :</strong> <?php echo htmlspecialchars($user->getRole()); ?>
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="/user/<?php echo $user->getId(); ?>" class="btn btn-view-profile btn-sm">Voir Profil</a>
                        <a href="/users/delete/<?php echo $user->getId(); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <div class="d-flex justify-content-center mt-5">
        <a href="/users/create" class="btn btn-create-account btn-lg">Créer un compte</a>
    </div>
</div>

