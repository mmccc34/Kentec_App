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
                    <th>details du client</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <!-- ID caché -->
                        <td>
                            <?php echo htmlspecialchars($client->getId()); ?>
                        </td>

                        <!-- Champ SIREN -->
                        <td>
                            <?php echo htmlspecialchars($client->getSiren()); ?>
                        </td>

                        <!-- Champ Nom -->
                        <td>
                            <?php echo htmlspecialchars($client->getName()); ?>
                        </td>

                        <!-- Champ NAF (ajusté en colonne vide pour exemple) -->
                        <td>
                            <?php echo htmlspecialchars($client->getNaf()); ?>
                        </td>

                        <!-- Champ Effectif -->
                        <td>
                            <?php echo htmlspecialchars($client->getStaff()); ?>
                        </td>

                        <!-- Date de création -->
                        <td>
                            <?= htmlspecialchars($client->getDateCreate()->format('Y-m-d')) ?> <br>

                        </td>
                        <td>
                            <a href="/client/<?php echo $client->getId(); ?>" class="btn btn-dark btn-sm">Voir Profil</a>

                        </td>

                        </form>

                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>