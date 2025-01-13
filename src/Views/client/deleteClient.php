<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un client</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h4>Confirmer la suppression</h4>
            </div>
            <div class="card-body">
                <p>Êtes-vous sûr de vouloir supprimer ce client ? Cette action est irréversible.</p>

                <!-- Informations du client -->
                <ul class="list-group mb-3">
                    <li class="list-group-item"><strong>SIREN :</strong> <?= htmlspecialchars($client->getsiren()) ?></li>
                    <li class="list-group-item"><strong>Nom :</strong> <?= htmlspecialchars($client->getname()) ?></li>
                    <li class="list-group-item"><strong>NAF :</strong> <?= htmlspecialchars($client->getnaf()) ?></li>
                    <li class="list-group-item"><strong>Staff :</strong> <?= htmlspecialchars($client->getstaff()) ?></li>
                    <li class="list-group-item"><strong>Date de création :</strong> <?= htmlspecialchars($client->getdateCreate()?->format('Y-m-d')) ?></li>
                </ul>

                <!-- Formulaire de confirmation -->
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($client->getId()) ?>">
                    <div class="d-flex justify-content-between">
                        <a href="/" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>






<div class="container my-5">
    <h2 class="text-center mb-4">Liste des Clients</h2>

    <!-- Tableau responsive Bootstrap -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Siren</th>
                    <th>Nom</th>
                    <th>NAF</th>
                    <th>Effectif</th>
                    <th>Date de Création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <form method="post" action="/client/update/<?= htmlspecialchars($client['id']) ?>">
                            <!-- ID caché -->
                            <td>
                                <?= htmlspecialchars($client['id']) ?>
                                <input type="hidden" name="id" value="<?= htmlspecialchars($client['id']) ?>">
                            </td>
                            
                            <!-- Champ SIREN -->
                            <td>
                                <input type="text" name="siren" 
                                       value="<?= htmlspecialchars($client['siren']) ?>" 
                                       class="form-control form-control-sm">
                            </td>

                            <!-- Champ Nom -->
                            <td>
                                <input type="text" name="name" 
                                       value="<?= htmlspecialchars($client['name']) ?>" 
                                       class="form-control form-control-sm">
                            </td>

                            <!-- Champ NAF -->
                            <td>
                                <input type="text" name="naf" 
                                       value="<?= htmlspecialchars($client['naf'] ?? '') ?>" 
                                       class="form-control form-control-sm">
                            </td>

                            <!-- Champ Effectif -->
                            <td>
                                <input type="text" name="staff" 
                                       value="<?= htmlspecialchars($client['staff'] ?? '') ?>" 
                                       class="form-control form-control-sm">
                            </td>

                            <!-- Date de création -->
                            <td>
                                <input type="date" name="dateCreate" 
                                       value="<?= htmlspecialchars($client['dateCreate'] ?? '') ?>" 
                                       class="form-control form-control-sm">
                            </td>

                            <!-- Actions -->
                            <td class="text-center">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i> Modifier
                                </button>
                                <a href="/client/delete/<?= htmlspecialchars($client['id']) ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');">
                                    <i class="bi bi-trash"></i> Supprimer
                                </a>
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


