<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="/users/create" id="btn-add" class="btn btn-primary w-15" style="background-color: #5a4a70;">+ Créer un Utilisateur</a>
    </div>
    <h2 class="custom-card-header">Liste des utilisateurs</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($list as $user): ?>
            <div class="col" id="user-<?php echo htmlspecialchars($user->getId()); ?>">
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
                        <h3 class="card-title"><?php echo htmlspecialchars($user->getFirstname() . ' ' . $user->getName()); ?></h3>
                        <p class="card-text">
                            <strong>Email :</strong> <?php echo htmlspecialchars($user->getEmail()); ?><br>
                            <strong>Rôle :</strong> <?php echo htmlspecialchars($user->getRole()); ?>
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="/user/<?php echo htmlspecialchars($user->getId()); ?>" class="btn btn-view-profile btn-sm">Voir Profil</a>
                        <!-- Bouton de suppression dynamique -->
                        <button type="button" class="btn btn-danger btn-delete" data-id="<?php echo htmlspecialchars($user->getId()); ?>">Supprimer</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Popup de succès -->
<div id="popup-success" style="display:none; position:fixed; top:20px; right:20px; background:#28a745; color:#fff; padding:15px; border-radius:5px; z-index:1000;">
    <span id="popup-message"></span>
</div>

<!-- Chargement du fichier JS -->
<script src="/deleteUser.js"></script>
