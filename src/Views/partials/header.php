<header>
    <nav class="container d-flex align-items-center justify-content-between">
      <a href="/" class="">Accueil</a>
        <p class="text-white">
            <?= htmlspecialchars($_SESSION['USER']->getFirstName()); ?>
            <?= htmlspecialchars($_SESSION['USER']->getName()); ?> &rarr;
            <?php
            $role = $_SESSION['ROLE'];
            echo htmlspecialchars($role === 'ROLE_ADMIN' ? 'Administrateur' : $role);
            ?>
        </p>
      <div>
        <a href="/planning">Planning</a>
        
        <a href="/users/list">Utilisateurs</a>

        <a href="/client/list">Clients</a> <!-- Lien vers la liste des clients -->


        <a href="/project/list">Projets</a>

        <?php
        if (isset($_SESSION["IS_AUTHENTICATED"]) && $_SESSION["IS_AUTHENTICATED"] === true) {
          echo '<a href="/logout">Log-out</a>';
        } else {
          echo '<a href="/login">Login</a>';
        }
        ?>
      </div>
    </nav>
  </header>
