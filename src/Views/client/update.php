<div class="container">
<h2 class="text-center my-4">Client à Réactualiser</h2>
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <form method="POST" action="" class="mt-5">
        <div class="mb-3">
          <label for="siren" class="form-label">SIREN :</label>
          <input type="text" name="siren" id="siren" value="<?= htmlspecialchars($client->getsiren()) ?>" required class="form-control">
        </div>

        <div class="mb-3">
          <label for="name" class="form-label">Nom :</label>
          <input type="text" name="name" id="name" value="<?= htmlspecialchars($client->getname()) ?>" class="form-control">
        </div>

        <div class="mb-3">
          <label for="naf" class="form-label">NAF :</label>
          <input type="text" name="naf" id="naf" value="<?= htmlspecialchars($client->getnaf()) ?>" class="form-control">
        </div>

        <div class="mb-3">
          <label for="staff" class="form-label">Staff :</label>
          <input type="number" name="staff" id="staff" value="<?= htmlspecialchars($client->getstaff()) ?>" class="form-control">
        </div>

        <div class="mb-3">
          <label for="dateCreate" class="form-label">Date de création :</label>
          <input type="date" name="dateCreate" id="dateCreate" value="<?= htmlspecialchars($client->getdateCreate()?->format('Y-m-d')) ?>" class="form-control">
        </div>

        <div class="text-center">
        <button
        type="submit"
        class="btn px-4 py-2"
        style="background-color: #4a3372; color: #fff; border: none;">
        Réactualiser
      </button>
        </div>
      </form>
    </div>
  </div>
</div>

