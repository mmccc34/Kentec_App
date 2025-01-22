<div class="container my-5">
    <h2 class="text-center mb-4">Liste des Clients</h2>
    <div class="container my-5">
    <!-- Bouton pour ajouter un client -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="/client/create" id = "btn-add"class="btn btn-success">+ Ajouter un Client</a>
    </div>

      <!-- Vérifie si la liste des clients est vide -->
    <?php if (empty($clients)): ?>
        <h3 class="text-center text-muted">Aucun Client Trouvé.</h3>
    <?php else: ?>
        <!-- Tableau responsive Bootstrap -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead id = "table-nav">
                    <tr>
                        <th>Siren</th>
                        <th>Nom</th>
                        <th>NAF</th>
                        <th>Effectif</th>
                        <th>Date de Création</th>
                        <th>Details du Client</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client): ?>
                        <tr id="client-<?php echo $client->getId()?>">
                            <!-- Champ SIREN -->
                            <td>
                                <?= htmlspecialchars($client->getSiren()); ?>
                            </td>
                        
                            <!-- Champ Nom -->
                            <td>
                                <?= htmlspecialchars($client->getName()); ?>
                            </td>

                            <!-- Champ NAF -->
                            <td>
                                <?= htmlspecialchars($client->getNaf()); ?>
                            </td>

                            <!-- Champ Effectif -->
                            <td>
                                <?= htmlspecialchars($client->getStaff()); ?>
                            </td>

                            <!-- Date de création -->
                            <td>
                                <?= htmlspecialchars($client->getDateCreate()->format('Y-m-d')); ?>
                            </td>

                            <!-- Lien vers le détail du client -->
                            <td>
                                <a href="/client/<?= $client->getId(); ?>" id= "btnprofil"class="btn btn-indigo ">Voir Profil</a>
                                <button class="btn btn-danger btn-delete" type="button" id="<?php echo $client->getId(); ?>">
                                    Supprimer
                                </button>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
<div id="popup-success" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
  <p id="popup-message">Client supprimé avec succès !</p>

</div>
<script defer src="../deleteClient.js"></script>
