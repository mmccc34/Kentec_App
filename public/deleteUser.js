// Sélectionne tous les boutons de suppression
document.addEventListener("DOMContentLoaded", function () {
    const btns = document.querySelectorAll(".btn-delete");

    btns.forEach(btn => {
        btn.addEventListener("click", () => {
            const userId = btn.getAttribute("data-id");

            console.log("ID utilisateur cliqué :", userId); // Vérification du bon ID

            // Vérification si l'ID est valide
            if (!userId || isNaN(Number(userId))) {
                console.error("ID utilisateur invalide");
                return;
            }

            const userChoice = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
            if (!userChoice) return; // Si l'utilisateur annule, on quitte la fonction

            supprimerUser(userId);
        });
    });
});

// Fonction pour afficher le popup de succès
function afficherPopup(message) {
    const popup = document.getElementById('popup-success');
    const messageContainer = document.getElementById('popup-message');

    messageContainer.innerHTML = ''; // Efface les anciens messages
    messageContainer.appendChild(document.createTextNode(message));

    popup.style.display = 'block'; // Affiche le popup
    setTimeout(() => {
        fermerPopup();
    }, 2000);
}

// Fonction pour fermer le popup
function fermerPopup() {
    const popup = document.getElementById('popup-success');
    popup.style.display = 'none';
}

// Fonction pour supprimer un utilisateur via une requête API
function supprimerUser(id) {
    const url = `/api/user/delete/${id}`;  // Assure-toi que cette route est bien configurée dans ton back-end

    console.log("Envoi de la requête DELETE à :", url);

    fetch(url, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then(response => {
            console.log("Réponse HTTP reçue :", response);
            if (!response.ok) {
                throw new Error(`Erreur HTTP ${response.status}`);
            }
            return response.json(); // Transforme la réponse en JSON
        })
        .then(data => {
            console.log("Réponse JSON reçue :", data);
            if (data.success) {
                afficherPopup('Utilisateur supprimé avec succès !');
                // Supprime dynamiquement l'élément utilisateur
                const userElement = document.getElementById("user-" + id);
                if (userElement) {
                    userElement.remove();
                } else {
                    console.warn("L'élément utilisateur à supprimer n'a pas été trouvé.");
                }
            } else {
                console.error("Erreur de suppression :", data.error);
            }
        })
        .catch(error => {
            console.error("Erreur lors de la suppression de l'utilisateur :", error);
        });
}
