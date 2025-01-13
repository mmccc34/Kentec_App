</head>
<body>
  <header>
    <nav class="container d-flex align-items-center justify-content-between">
      <a href="/" class="">Accueil</a>
      <div>
        <a href="/users/list">Utilisateurs</a>
        <a href="/client/list">Liste des Clients</a> <!-- Lien vers la liste des clients -->

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
