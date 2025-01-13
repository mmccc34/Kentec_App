<div class="container my-5">
    <h2 class="text-center mb-4">Liste des Clients</h2>

      <!-- Vérifie si la liste des clients est vide -->
    <?php if (empty($clients)): ?>
        <h3 class="text-center text-muted">Aucun Client Trouvé.</h3>
    <?php else: ?>
        <!-- Tableau responsive Bootstrap -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
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
                                <a href="/client/<?= $client->getId(); ?>" class="btn btn-dark ">Voir Profil</a>
                                <a href="/client/delete/<?php echo $client->getId(); ?>" class="btn btn-danger btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
