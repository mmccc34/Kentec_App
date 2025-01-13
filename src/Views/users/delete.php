<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-danger text-white text-center">
            <h2>Confirmation de la suppression</h2>
        </div>
        <div class="card-body text-center">
            <p class="mb-4">Êtes-vous sûr de vouloir supprimer l'utilisateur suivant ? Cette action est irréversible.</p>
            <div class="mb-3">
                <strong>ID :</strong> <?php echo htmlspecialchars($user->getId()); ?><br>
                <strong>Nom complet :</strong> <?php echo htmlspecialchars($user->getFirstname() . ' ' . $user->getName()); ?><br>
                <strong>Email :</strong> <?php echo htmlspecialchars($user->getEmail()); ?><br>
                <strong>Rôle :</strong> <?php echo htmlspecialchars($user->getRole()); ?>
            </div>
        </div>
        <div class="card-footer text-center">
            <form method="POST" action="/users/delete">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($user->getId()); ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
                <a href="/users/list" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
