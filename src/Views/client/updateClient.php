<form method="POST" action="">
    <label for="siren">SIREN :</label>
    <input type="text" name="siren" id="siren" value="<?= htmlspecialchars($client->getsiren()) ?>" required>

    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($client->getname()) ?>">

    <label for="naf">NAF :</label>
    <input type="text" name="naf" id="naf" value="<?= htmlspecialchars($client->getnaf()) ?>">

    <label for="staff">Staff :</label>
    <input type="number" name="staff" id="staff" value="<?= htmlspecialchars($client->getstaff()) ?>">

    <label for="dateCreate">Date de création :</label>
    <input type="date" name="dateCreate" id="dateCreate" value="<?= htmlspecialchars($client->getdateCreate()?->format('Y-m-d')) ?>">

    <button type="submit">Mettre à jour</button>
</form>
