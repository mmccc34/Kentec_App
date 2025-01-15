const btns = document.querySelectorAll(".btn-delete");

btns.forEach(btn => {
  btn.addEventListener("click", () => {
    const clientId = btn.id;
// verification si l'ID est valid (pour eviter que des valeurs inatendue soient passées à la fonction)
    
if(!clientId || isNaN(clientId)){
  console.log("ID client invalide");
  return;
}
const clientChoice = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?")
    if (!clientChoice) return; // retourn et n'execute pas le fetch
    supprimerClient(clientId)
  })
});

// Fonction pour afficher le popup
function afficherPopup(message) {
  const popup = document.getElementById('popup-success');
  const safeMessage = document.createTextNode(message)
  const messageContainer = document.getElementById(`popup-message`)
  //document.getElementById('popup-message').textContent = message; // Mettre à jour le message

  //effacer les anciens messages et ajouter le nouveau
  messageContainer.innerHTML``;
  messageContainer.appendChild(safeMessage);

  popup.style.display = 'none'; // Afficher le popup
  setTimeout(() => {
    fermerPopup();
  }, 3000)
}

// Fonction pour fermer le popup
function fermerPopup() {
  const popup = document.getElementById('popup-success');
  popup.style.display = 'none'; // Cacher le popup
}

// Fonction pour supprimer un client
function supprimerClient(id) {
  // L'URL de votre endpoint
  const url = `http://localhost:2003/api/client/delete/${id}`;

  // Utilisation de fetch pour envoyer une requête DELETE
  fetch(url, {
    method: 'DELETE', // Spécifie la méthode HTTP
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
      console.log("id client: " + id)
      document.getElementById("client-" + id).remove();
    })
    .catch(error => {
      console.error('Erreur lors de la suppression du client:', error);
    });
}

/* Ajout de sécurité a 2 endroits:

1 vérification si l'id est valide
2 Sécurisation du popup (du message envoyer)


*/




