<footer>
    <div class="footer text-center p-5" style="background-color: #4b3550; color: white;">
        <p>Vous êtes <?= htmlspecialchars($_SESSION['USER']->getFirstName()); ?> <?= htmlspecialchars($_SESSION['USER']->getName());?> et vous êtes connecté en tant que :
            <?php

            $role = $_SESSION['ROLE'];
            if ($role === 'ROLE_ADMIN') {
                $role = 'ADMINISTRATEUR';
            }
            echo htmlspecialchars($role);
            ?></p>
        <p style="color: #9b7b97;">Merci d'utiliser notre Application de Gestion de Projets</p>
        <p class="mt-4" style="color: #aca2b3a1;">© 2024 Application de Gestion de Projets - Tous droits réservés</p>
    </div>

</footer>