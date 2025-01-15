<h2 class="text-center my-4">Créer un nouveau Client</h2>
<div class="container">

  <div class="d-flex justify-content-center vh-100 align-items-center">
    <form class="w-50 p-4 border rounded shadow" method="post" action="">
      <!-- SIREN -->
      <div class="mb-3">
        <label for="siren" class="form-label fw-bold">SIREN</label>
        <input
          type="text"
          class="form-control"
          id="siren"
          name="siren"
          placeholder="Entrez le numéro SIREN"
          required
          pattern="\d{9}"
          title="Le SIREN doit comporter exactement 9 chiffres." />
      </div>

      <!-- Name -->
      <div class="mb-3">
        <label for="name" class="form-label fw-bold">Nom</label>
        <input
          type="text"
          class="form-control"
          id="name"
          name="name"
          placeholder="Nom de l'entreprise"
          required />
      </div>

      <!-- NAF -->
      <div class="mb-3">
        <label for="naf" class="form-label fw-bold">Code NAF</label>
        <input
          type="text"
          class="form-control"
          id="naf"
          name="naf"
          placeholder="Code NAF (5 caractères)"
          required
          pattern="\d{5}"
          title="Le code NAF doit comporter exactement 5 chiffres." />
      </div>

      <!-- Staff -->
      <div class="mb-3">
        <label for="staff" class="form-label fw-bold">Nombre d'employés</label>
        <input
          type="number"
          class="form-control"
          id="staff"
          name="staff"
          placeholder="Entrez le nombre d'employés"
          required
          min="1" />
      </div>

      <!-- Date -->
      <div class="mb-3">
        <label for="date" class="form-label fw-bold">Date de création</label>
        <input
          type="date"
          class="form-control"
          id="date"
          name="dateCreate"
          required />
      </div>

      <!-- Bouton d'envoi -->
      <button
        type="submit"
        class="btn px-4 py-2"
        id="btn-add">
        Créer
      </button>
    </form>
  </div>
</div>