<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Gestion de Projets</title>
    <!-- Lien vers la feuille de style Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style pour la section Hero : occupe toute la hauteur de l'écran */
        .hero-section {
            height: 100vh;
            background-color: #007bff;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .btn-custom {
            width: 300px;
            margin: 10px;
            font-size: 1.2rem;
        }

        .feature-card {
            min-height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* Empêche le scroll de la page */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>

<!-- Section Hero -->
<section class="hero-section">
    <div>
        <h1 class="display-4 mb-4">Tableau de Bord de Gestion des Projets</h1>
        <p class="lead mb-4">Gérez vos développeurs et vos projets efficacement.</p>
        <a href="/users/list" class="btn btn-light btn-custom">Gestion des Développeurs</a>
        <a href="/projects" class="btn btn-light btn-custom">Gestion des Projets</a>
        <a href="/statistics" class="btn btn-light btn-custom">Statistiques</a>
    </div>
</section>

<!-- Section Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2025 Gestion de Projets | Tous droits réservés</p>
</footer>

<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
