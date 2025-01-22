const days = document.getElementsByClassName("day-to-click"); // HTMLCollection
const deleteS = document.getElementsByClassName("btn-delete-task");
const popup = document.getElementById("popup-success");

Array.from(deleteS).forEach((btn) => {
  btn.addEventListener("click", () => {
    if (confirm("êtes vous sûr de vouloir supprimer cette tâche?")) {
      supprimerTask(btn.dataset.idtask);
    }
  });
});
// Convertir la collection en tableau et ajouter des écouteurs d'événements
Array.from(days).forEach((element) => {
  element.addEventListener("click", () => {
    verifyEmptiness(element.dataset.dev, element.dataset.day).then((empty) => {
      if (empty === "true" && popup.style.display === "none") {
        displayFrom(
          element.dataset.dev,
          element.dataset.devname,
          element.dataset.day
        );
      }
    });
  });
});

function verifyEmptiness(dev, day) {
  // URL de l'API
  const url = `http://localhost:2003/api/task/check`;

  // Corps de la requête avec les données envoyées
  const requestBody = {
    dev: dev,
    day: day,
  };

  return fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json", // Indique que nous envoyons des données JSON
    },
    body: JSON.stringify(requestBody), // Convertit le corps en chaîne JSON
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error(`Erreur réseau : ${response.status}`);
      }
      return response.json(); // Si le serveur répond avec JSON
    })
    .then((data) => {
      return data.empty;
    })
    .catch((error) => {
      console.error("Erreur lors de la requête :", error);
    });
}

function displayFrom(idDev, devName, day) {
  const modal = document.getElementById("modal");
  const closeModal = document.getElementById("close-modal");
  const startDate = document.getElementById("startDate");
  const endDate = document.getElementById("endDate");
  const dev = document.getElementById("dev");
  const devInput = document.getElementById("dev-id");

  dev.textContent = devName;
  startDate.value = day;
  endDate.value = day;
  devInput.value = idDev;

  modal.style.display = "flex";
  closeModal.addEventListener("click", () => {
    modal.style.display = "none";
  });
}

function supprimerTask(id) {
  // L'URL de votre endpoint
  const url = `http://localhost:2003/api/task/delete/${id}`;

  // Utilisation de fetch pour envoyer une requête DELETE
  fetch(url, {
    method: "DELETE", // Spécifie la méthode HTTP
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error(
          "La requête a échoué avec le statut " + response.status
        );
      }
      return response.json();
    })
    .then((data) => {
      // Afficher le popup de succès
      afficherPopup("Task supprimée avec succès !");

      // Supprimer la div contenant le client
      document.getElementById("task-" + id).remove();
    })
    .catch((error) => {
      console.error("Erreur lors de la suppression de la Task:", error);
    });
}
function afficherPopup(message) {
  const popup = document.getElementById("popup-success");
  const messageContainer = document.getElementById(`popup-message`);
  //document.getElementById('popup-message').textContent = message; // Mettre à jour le message

  //effacer les anciens messages et ajouter le nouveau
  messageContainer.textContent = "";
  messageContainer.textContent = message;

  popup.style.display = "flex"; // Afficher le popup
  setTimeout(() => {
    popup.style.display = "none";
  }, 3000);
}
