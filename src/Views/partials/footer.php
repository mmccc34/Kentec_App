<footer>
    <div class="footer text-center p-5 custom-footer">
        <?php if (isset($_SESSION["IS_AUTHENTICATED"]) && $_SESSION["IS_AUTHENTICATED"] === true): ?>
            <p>
                Vous êtes <?= htmlspecialchars($_SESSION['USER']->getFirstName()); ?>
                <?= htmlspecialchars($_SESSION['USER']->getName()); ?> et vous êtes connecté en tant que :
                <?php
                $role = $_SESSION['ROLE'];
                echo htmlspecialchars($role === 'ROLE_ADMIN' ? 'ADMINISTRATEUR' : $role);
                ?>
            </p>
            <p class="footer-thanks">Merci d'utiliser notre Application de Gestion de Projets</p>
            <p class="footer-rights mt-4">© 2024 Application de Gestion de Projets - Tous droits réservés</p>
        <?php endif; ?>
    </div>
</footer>
