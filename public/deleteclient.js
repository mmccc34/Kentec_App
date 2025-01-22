const btns = document.querySelectorAll(".btn-delete");

btns.forEach(btn => {
  btn.addEventListener("click", () => {
    const clientId = btn.id;

    // Vérification si l'ID est valide
    if (!clientId || isNaN(Number(clientId))) {
      console.log("ID client invalide");
      return;
    }

    const clientChoice = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
    if (!clientChoice) return; // Retourner si l'utilisateur annule

    supprimerClient(clientId);
  });
});

// Fonction pour afficher le popup
function afficherPopup(message) {
  const popup = document.getElementById('popup-success');
  const safeMessage = document.createTextNode(message);
  const messageContainer = document.getElementById('popup-message');

  // Effacer les anciens messages et ajouter le nouveau
  messageContainer.innerHTML = ''; // Correction ici
  messageContainer.appendChild(safeMessage);

  popup.style.display = 'block'; // Afficher le popup
  setTimeout(() => {
    fermerPopup();
  }, 2000);
}

// Fonction pour fermer le popup
function fermerPopup() {
  const popup = document.getElementById('popup-success');
  popup.style.display = 'none'; // Cacher le popupe
}

// Fonction pour supprimer un client
function supprimerClient(id) {
  const url = `http://localhost:2003/api/client/delete/${id}`;

  fetch(url, {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('La requête a échoué avec le statut ' + response.status);
      }
      return response.json();
    })
    .then(data => {
      console.log('Client supprimé avec succès:', data);

      // Afficher le popup de succès
      afficherPopup('Client supprimé avec succès !');

      // Supprimer la div contenant le client
      const clientElement = document.getElementById("client-" + id);
      if (clientElement) {
        clientElement.remove();
      } else {
        console.warn("L'élément client à supprimer n'a pas été trouvé.");
      }
    })
    .catch(error => {
      console.error('Erreur lors de la suppression du client:', error.message);
      console.error('Détails de l\'erreur:', error);
    });
}
